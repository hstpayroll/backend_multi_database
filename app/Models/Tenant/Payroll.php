<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payroll extends Model
{
    protected $table = 'payrolls';
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'payroll_period_id',
        'cost_center_id',
        'number_of_days_worked',
        'basic_salary_arrears',
        'actual_basic_salary',
        'total_ot_amount',
        'total_shift_allowance_amount',
        'total_on_call_allowance_amount',
        'total_taxable_allowance',
        'total_non_taxable_allowance_amount',
        'total_allowance',
        'total_taxable_income',
        'total_non_taxable_income_amount',
        'total_income',
        'gross_pay',
        'income_tax',
        'pension',
        'pension_arrears',
        'actual_pension',
        'total_deductions',
        'net_pay',
    ];


    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
    public function payrollPeriod(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'payroll_period_id', 'id');
    }
    public function costCenter(): BelongsTo
    {
        return $this->belongsTo(CostCenter::class, 'cost_center_id', 'id');
    }

    public function calculateTotalOtAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalOtAmount = OvertimeCalculation::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('ot_value');

        return $totalOtAmount;
    }

    public function calculateTotalTaxableAllowanceAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalTaxableAllowance = AllowanceTransaction::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('taxable_amount');

        return $totalTaxableAllowance;
    }
    public function calculateNonTotalTaxableAllowanceAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalNonTaxableAllowance = AllowanceTransaction::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('non_taxable_amount');

        return $totalNonTaxableAllowance;
    }
    public function calculateTotalAllowance()
    {
        $taxable = $this->calculateTotalTaxableAllowanceAmount();
        $non_taxable = $this->calculateNonTotalTaxableAllowanceAmount();
        $totalAllowance = $taxable + $non_taxable;
        return $totalAllowance;
    }
    public function calculateTaxableIncome()
    {
        $salary = $this->employee->salary;
        $ot = $this->calculateTotalOtAmount();
        $taxableAllowance = $this->calculateTotalTaxableAllowanceAmount();

        $total = $salary + $ot;
        +$taxableAllowance;

        return $total;
    }

    public  function calculateIncomeTax()
    {
        $tax = 0;
        if ($this->total_taxable_income >= 0 && $this->total_taxable_income <= 600) {
            $tax = $this->total_taxable_income * 0;
        } elseif ($this->total_taxable_income >= 601 && $this->total_taxable_income <= 1650) {
            $tax = $this->total_taxable_income * 0.1 - 60;
        } elseif ($this->total_taxable_income >= 1651 && $this->total_taxable_income <= 3200) {
            $tax = $this->total_taxable_income * 0.15 - 142.5;
        } elseif ($this->total_taxable_income >= 3201 && $this->total_taxable_income <= 5250) {
            $tax = $this->total_taxable_income * 0.2 - 302.5;
        } elseif ($this->total_taxable_income >= 5251 && $this->total_taxable_income <= 7800) {
            $tax = $this->total_taxable_income * 0.25 - 565;
        } elseif ($this->total_taxable_income >= 7801 && $this->total_taxable_income <= 10900) {
            $tax = $this->total_taxable_income * 0.3 - 955;
        } elseif ($this->total_taxable_income > 10901) {
            $tax = $this->total_taxable_income * 0.35 - 1500;
        }
        return $tax;
    }
}
