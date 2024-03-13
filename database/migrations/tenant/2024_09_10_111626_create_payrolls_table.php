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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('payroll_period_id')->constrained('payroll_periods')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('cost_center_id')->constrained('cost_centers')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('number_of_days_worked')->default(0);

            $table->decimal('basic_salary_arrears', 10, 2)->default(0);
            $table->decimal('actual_basic_salary', 10, 2)->default(0);

            $table->decimal('total_ot_amount', 10, 2)->default(0);
            $table->decimal('total_shift_allowance_amount', 10, 2)->default(0);
            $table->decimal('total_on_call_allowance_amount', 10, 2)->default(0);

            $table->decimal('total_taxable_allowance', 10, 2)->default(0);
            $table->decimal('total_non_taxable_allowance_amount', 10, 2)->default(0);
            $table->decimal('total_allowance', 10, 2)->default(0);

            $table->decimal('total_taxable_income', 10, 2)->default(0);
            $table->decimal('total_non_taxable_income_amount', 10, 2)->default(0);
            $table->decimal('total_income', 10, 2)->default(0);

            $table->decimal('gross_pay', 10, 2)->default(0);

            $table->decimal('income_tax', 10, 2)->default(0);

            $table->decimal('pension', 10, 2)->default(0);
            $table->decimal('pension_arrears', 10, 2)->default(0);
            $table->decimal('actual_pension', 10, 2)->default(0);

            $table->decimal('total_deductions', 10, 2)->default(0);

            $table->decimal('net_pay', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
