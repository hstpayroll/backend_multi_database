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
        Schema::create('deduction_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_period_id')->constrained('payroll_periods')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('deduction_id')->constrained('deductions')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount_deducted', 10, 2);
            $table->decimal('outstanding_amount', 10, 2);
            $table->boolean('is_partial')->default(false);
            $table->boolean('is_missed')->default(false);
            $table->date('start_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deduction_transactions');
    }
};
