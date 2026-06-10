<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\InventoryLog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $query = Transaction::with(['branch', 'cashier', 'details']);

        if ($user->isOwner()) {
            $transactions = $query->latest()->paginate(20);
        } else {
            $transactions = $query->where('branch_id', $user->branch_id)->latest()->paginate(20);
        }

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $branch = auth()->user()->branch_id ? Branch::find(auth()->user()->branch_id) : null;
        $products = Product::all();
        
        return view('transactions.create', compact('branch', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'type' => 'required|in:sale,return',
            'payment_method' => 'required|in:cash,card,transfer',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'paid_amount' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        // Generate transaction number
        $transactionNumber = 'TRX-' . now()->format('YmdHis');

        // Calculate totals
        $totalAmount = 0;
        foreach ($validated['items'] as $item) {
            $totalAmount += $item['quantity'] * $item['price'];
        }

        // Create transaction
        $transaction = Transaction::create([
            'transaction_number' => $transactionNumber,
            'branch_id' => $validated['branch_id'],
            'cashier_id' => auth()->id(),
            'type' => $validated['type'],
            'total_amount' => $totalAmount,
            'paid_amount' => $validated['paid_amount'] ?? $totalAmount,
            'change_amount' => ($validated['paid_amount'] ?? $totalAmount) - $totalAmount,
            'payment_method' => $validated['payment_method'],
            'status' => 'completed',
            'completed_at' => now(),
            'notes' => $validated['notes'] ?? null,
        ]);

        // Create transaction details and update inventory
        foreach ($validated['items'] as $item) {
            $subtotal = $item['quantity'] * $item['price'];

            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $subtotal,
            ]);

            // Update inventory
            $inventory = Inventory::firstOrCreate(
                [
                    'branch_id' => $validated['branch_id'],
                    'product_id' => $item['product_id'],
                ],
                ['quantity' => 0]
            );

            if ($validated['type'] === 'sale') {
                $inventory->decrement('quantity', $item['quantity']);
            } else {
                $inventory->increment('quantity', $item['quantity']);
            }

            // Create inventory log
            InventoryLog::create([
                'branch_id' => $validated['branch_id'],
                'product_id' => $item['product_id'],
                'user_id' => auth()->id(),
                'type' => $validated['type'] === 'sale' ? 'out' : 'in',
                'reason' => $validated['type'] === 'sale' ? 'sale' : 'return',
                'quantity' => $item['quantity'],
                'transaction_id' => $transaction->id,
            ]);
        }

        return redirect()->route('transactions.show', $transaction)->with('success', 'Transaksi berhasil dibuat');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['branch', 'cashier', 'supervisor', 'details']);
        return view('transactions.show', compact('transaction'));
    }

    public function report(Request $request)
    {
        $user = auth()->user();
        $startDate = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : Carbon::now()->startOfMonth();
        $endDate = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : Carbon::now()->endOfMonth();
        $branchId = $request->get('branch_id');

        $query = Transaction::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'completed');

        if (!$user->isOwner()) {
            $query->where('branch_id', $user->branch_id);
        } elseif ($branchId) {
            $query->where('branch_id', $branchId);
        }

        $transactions = $query->with(['branch', 'cashier', 'details'])->latest()->paginate(30);
        
        $totalRevenue = clone $query;
        $totalRevenue = $totalRevenue->sum('total_amount');

        $branches = $user->isOwner() ? Branch::all() : [$user->branch];

        return view('transactions.report', compact('transactions', 'totalRevenue', 'branches', 'startDate', 'endDate'));
    }
}