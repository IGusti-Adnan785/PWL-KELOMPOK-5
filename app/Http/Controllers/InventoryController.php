<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Branch;
use App\Models\Product;
use App\Models\InventoryLog;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Inventory::with(['branch', 'product']);

        if ($user->isOwner()) {
            $inventories = $query->paginate(20);
            $branches = Branch::all();
        } else {
            $inventories = $query->where('branch_id', $user->branch_id)->paginate(20);
            $branches = [$user->branch];
        }

        return view('inventory.index', compact('inventories', 'branches'));
    }

    public function show(Branch $branch)
    {
        $inventories = Inventory::where('branch_id', $branch->id)
            ->with('product')
            ->paginate(20);

        $lowStockProducts = $inventories->filter(fn($inv) => 
            $inv->quantity <= $inv->product->reorder_point
        );

        return view('inventory.branch', compact('branch', 'inventories', 'lowStockProducts'));
    }

    public function adjust(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer',
            'reason' => 'required|in:receiving,adjustment,damage,expired',
            'notes' => 'nullable|string',
        ]);

        $oldQuantity = $inventory->quantity;
        $newQuantity = $validated['quantity'];
        $difference = $newQuantity - $oldQuantity;

        $inventory->update(['quantity' => $newQuantity]);

        InventoryLog::create([
            'branch_id' => $inventory->branch_id,
            'product_id' => $inventory->product_id,
            'user_id' => auth()->id(),
            'type' => $difference > 0 ? 'in' : 'out',
            'reason' => $validated['reason'],
            'quantity' => abs($difference),
            'notes' => $validated['notes'],
        ]);

        return redirect()->back()->with('success', 'Stok berhasil disesuaikan');
    }

    public function logs(Branch $branch)
    {
        $logs = InventoryLog::where('branch_id', $branch->id)
            ->with(['product', 'user'])
            ->latest()
            ->paginate(30);

        return view('inventory.logs', compact('branch', 'logs'));
    }

    public function report(Request $request)
    {
        $user = auth()->user();
        $branchId = $request->get('branch_id');

        if ($user->isOwner() && $branchId) {
            $inventories = Inventory::where('branch_id', $branchId)
                ->with(['product', 'branch'])
                ->get();
        } elseif ($user->isOwner()) {
            $inventories = Inventory::with(['product', 'branch'])->get();
        } else {
            $inventories = Inventory::where('branch_id', $user->branch_id)
                ->with(['product', 'branch'])
                ->get();
        }

        return view('inventory.report', compact('inventories'));
    }
}