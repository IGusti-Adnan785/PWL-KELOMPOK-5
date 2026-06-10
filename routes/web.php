<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\InventoryController;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

// Authentication Routes
Route::post('/logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt($credentials, request()->filled('remember'))) {
        request()->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
})->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'role' => 'cashier', // Default role for new registrations
    ]);

    auth()->login($user);
    return redirect('/dashboard');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Branch Management (Only Owner)
    Route::middleware('role:owner')->group(function () {
        Route::resource('branches', BranchController::class);
    });

    // Products Management (Owner and Manager)
    Route::middleware('role:owner,manager')->group(function () {
        Route::resource('products', ProductController::class);
    });

    // Inventory Management
    Route::middleware('branch')->group(function () {
        Route::resource('inventory', InventoryController::class, ['only' => ['index', 'show']]);
        Route::post('/inventory/{inventory}/adjust', [InventoryController::class, 'adjust'])->name('inventory.adjust');
        Route::get('/inventory-logs/{branch}', [InventoryController::class, 'logs'])->name('inventory.logs');
        Route::get('/inventory-report', [InventoryController::class, 'report'])->name('inventory.report');
    });

    // Transaction Management
    Route::middleware('branch')->group(function () {
        Route::resource('transactions', TransactionController::class, ['only' => ['index', 'create', 'store', 'show']]);
        Route::get('/transactions-report', [TransactionController::class, 'report'])->name('transactions.report');
    });
});