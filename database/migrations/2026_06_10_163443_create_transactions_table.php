<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('cashier_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('supervisor_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('type', ['sale', 'return'])->default('sale'); // Tipe transaksi: penjualan atau retur
            $table->decimal('total_amount', 12, 2);
            $table->decimal('paid_amount', 12, 2)->nullable();
            $table->decimal('change_amount', 12, 2)->nullable();
            $table->enum('payment_method', ['cash', 'card', 'transfer'])->default('cash');
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};