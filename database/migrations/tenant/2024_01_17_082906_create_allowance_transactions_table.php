<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allowance_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('payroll_date')->nullable();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('allowance_type_id')->constrained('allowance_types')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('taxable_amount', 10, 2)->default(0);
            $table->decimal('non_taxable_amount', 10, 2)->default(0);
            $table->boolean('is_day_based')->default(0);
            $table->date('start_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowance_transactions');
    }
};
