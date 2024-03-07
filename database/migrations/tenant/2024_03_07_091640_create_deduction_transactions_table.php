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
            $table->foreignId('payroll_period_id')->constrained('payroll_periods')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('start_date')->nullable();
            $table->tinyInteger('status')->default(0); //0 for inactive 1 for active
            $table->timestamps();
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
