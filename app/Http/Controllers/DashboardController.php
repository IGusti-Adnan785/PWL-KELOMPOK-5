<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Transaction;
use App\Models\Inventory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isOwner()) {
            return $this->ownerDashboard();
        } elseif ($user->isManager()) {
            return $this->managerDashboard($user->branch_id);
        } elseif ($user->isSupervisor()) {
            return $this->supervisorDashboard($user->branch_id);
        } elseif ($user->isCashier()) {
            return $this->cashierDashboard($user->branch_id);
        } else {
            return $this->warehouseDashboard($user->branch_id);
        }
    }

    private function ownerDashboard()
    {
        $branches = Branch::withCount('transactions')->with('manager')->get();
        
        // Total statistics
        $totalTransactions = Transaction::whereBetween('created_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->sum('total_amount');
        
        $totalBranches = Branch::count();
        $totalRevenue = Transaction::where('status', 'completed')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->sum('total_amount');

        return view('dashboard.owner', compact('branches', 'totalTransactions', 'totalBranches', 'totalRevenue'));
    }

    private function managerDashboard($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        
        $transactions = Transaction::where('branch_id', $branchId)
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->with(['cashier', 'details'])
            ->latest()
            ->limit(10)
            ->get();

        $totalRevenue = Transaction::where('branch_id', $branchId)
            ->where('status', 'completed')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->sum('total_amount');

        // Low stock products
        $lowStockProducts = Inventory::where('branch_id', $branchId)
            ->whereColumn('quantity', '<=', 'reserved_quantity')
            ->with('product')
            ->get();

        return view('dashboard.manager', compact('branch', 'transactions', 'totalRevenue', 'lowStockProducts'));
    }

    private function supervisorDashboard($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        
        $todayTransactions = Transaction::where('branch_id', $branchId)
            ->whereDate('created_at', Carbon::today())
            ->with(['cashier', 'details'])
            ->get();

        $todayRevenue = $todayTransactions->sum('total_amount');
        $transactionCount = $todayTransactions->count();

        return view('dashboard.supervisor', compact('branch', 'todayTransactions', 'todayRevenue', 'transactionCount'));
    }

    private function cashierDashboard($branchId)
    {
        $branch = Branch::findOrFail($branchId);
        
        return view('dashboard.cashier', compact('branch'));
    }

    private function warehouseDashboard($branchId)
    {
        $branch = Branch::findOrFail($branchId);

        // Get inventory with low stock
        $inventories = Inventory::where('branch_id', $branchId)
            ->with('product')
            ->orderBy('quantity')
            ->get();

        // Group by reorder point
        $lowStock = $inventories->filter(fn($inv) => $inv->quantity <= $inv->product->reorder_point);
        $normalStock = $inventories->filter(fn($inv) => $inv->quantity > $inv->product->reorder_point);

        return view('dashboard.warehouse', compact('branch', 'lowStock', 'normalStock'));
    }
}