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
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('income_taxe_id')->constrained('income_taxes')->onDelete('restrict')->onUpdate('cascade');
            $table->date('payroll_date');
            $table->integer('number_of_days_worked')->default(26);
            $table->decimal('basic_salary_arrears', 10, 2)->default(0);
            $table->decimal('sip_payment', 10, 2)->default(0);
            $table->decimal('bonus', 10, 2)->default(0);
            $table->foreignId('over_time_calculation_id')->constrained('over_time_calculations')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('annual_leave_payment', 10, 2)->default(0);
            $table->decimal('review_allowance', 10, 2)->default(0);
            $table->decimal('security_allowance', 10, 2)->default(0);
            $table->decimal('relocation_allowance', 10, 2)->default(0);
            $table->decimal('handset_allowance', 10, 2)->default(0);
            $table->decimal('staff_award_payment', 10, 2)->default(0);
            $table->decimal('car_allowance', 10, 2)->default(0);
            $table->decimal('motor_vehicle_tax_gross_up', 10, 2)->default(0);
            $table->decimal('motor_vehicle_tax_adjustment', 10, 2)->default(0);
            $table->decimal('gross_pay', 10, 2)->default(0);
            $table->decimal('total_taxable_income', 10, 2)->default(0);
            $table->decimal('taxable_income_exclude_motor_vehicle', 10, 2)->default(0);
            $table->decimal('income_tax', 10, 2)->default(0);
            $table->decimal('pension', 10, 2)->default(0);
            $table->decimal('pension_arrears', 10, 2)->default(0);
            $table->decimal('actual_pension', 10, 2)->default(0);
            $table->decimal('penalty', 10, 2)->default(0);

            $table->decimal('deduction_of_advance_paid_star_award',10,2)->default(0);
            $table->decimal('deduction_of_overpaid_motor_vehicle_tax',10,2)->default(0);
            $table->decimal('review_allowance_recovery',10,2)->default(0);
            $table->decimal('acting_allowance_recovery',10,2)->default(0);
            $table->decimal('deduction_due_to_unnoticed_resignation',10,2)->default(0);
            $table->decimal('deduction_of_overutilized_leave',10,2)->default(0);
            $table->decimal('cash_advance_recovery',10,2)->default(0);
            $table->decimal('outstanding_cash_advance',10,2)->default(0);
            $table->decimal('salary_advance_recovery',10,2)->default(0);
            $table->decimal('outstanding_salary_advance',10,2)->default(0);
            $table->decimal('laptop_recovery',10,2)->default(0);
            $table->decimal('outstanding_laptop_recovery',10,2)->default(0);
            $table->decimal('hardship_allowance_recovery',10,2)->default(0);
            $table->decimal('outstanding_hardship_allowance_recovery',10,2)->default(0);
            $table->decimal('"total_deductions"',10,2)->default(0);
            $table->decimal('net_pay',10,2)->default(0);
            $table->decimal('employer_pension',10,2)->default(0); // 11%
            $table->decimal('employer_pension_arrear',10,2)->default(0); // 11%
            $table->decimal('actual_employer_pension',10,2)->default(0);
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
