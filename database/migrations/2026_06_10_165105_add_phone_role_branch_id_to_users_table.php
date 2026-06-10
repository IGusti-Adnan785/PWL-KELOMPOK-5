<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('role')->default('cashier')->after('phone'); // owner, manager, supervisor, cashier, warehouse
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onDelete('set null')->after('role');
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'branch_id']);
            $table->dropSoftDeletes();
        });
    }
};