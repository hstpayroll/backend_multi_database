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
        'total_taxable_allowance',
        'total_non_taxable_allowance_amount',
        'total_allowance',
        'total_taxable_income',
        'total_non_taxable_income_amount',
        'gross_pay',
        'income_tax',
        'total_deductions',
        'employee_pension',
        'employee_pension_arrears',
        'employee_actual_pension',
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
    //Total OT Amount
    public function calculateTotalOtAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalOtAmount = OvertimeCalculation::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('ot_value');

        return $totalOtAmount;
    }

    //Total Shift Allowance
    public function calculateShiftAllowanceAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalShiftAllowance = ShiftAllowanceCalculation::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('value');

        return $totalShiftAllowance;
    }
    //Total Taxable Allowance
    public function calculateTotalTaxableAllowanceAmount()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalTaxableAllowance = AllowanceTransaction::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('taxable_amount');

        return $totalTaxableAllowance;
    }
    //Total Non Taxable Allowance
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
        $employee = $this->employee; // Or access through the related model

        $totalAllowances = $employee->allowanceTypes()
            ->withPivot('value_in_birr')
            ->sum('value_in_birr');
        return $totalAllowances;
    }

    //Taxable Income
    public function calculateTaxableIncome()
    {
        $total =  $this->employee->salary +
            $this->calculateTotalOtAmount() +
            $this->calculateTotalTaxableAllowanceAmount();

        return $total;
    }
    //Non Taxable Income
    public function calculateNonTaxableIncome()
    {
        $non_taxable_allowance = $this->calculateNonTotalTaxableAllowanceAmount();
        return $non_taxable_allowance;
    }
    //Gross Pay
    public function calculateGrossPay()
    {
        $grossPay =
            $this->calculateTaxableIncome() +
            $this->calculateNonTotalTaxableAllowanceAmount();

        return $grossPay;
    }

    //Income Tax
    // public  function calculateIncomeTax()
    // {
    //     $tax = 0;
    //     if ($this->calculateTaxableIncome() >= 0 && $this->calculateTaxableIncome() <= 600) {
    //         $tax = $this->calculateTaxableIncome() * 0;
    //     } elseif ($this->calculateTaxableIncome() >= 601 && $this->calculateTaxableIncome() <= 1650) {
    //         $tax = $this->calculateTaxableIncome() * 0.1 - 60;
    //     } elseif ($this->calculateTaxableIncome() >= 1651 && $this->calculateTaxableIncome() <= 3200) {
    //         $tax = $this->calculateTaxableIncome() * 0.15 - 142.5;
    //     } elseif ($this->calculateTaxableIncome() >= 3201 && $this->calculateTaxableIncome() <= 5250) {
    //         $tax = $this->calculateTaxableIncome() * 0.2 - 302.5;
    //     } elseif ($this->calculateTaxableIncome() >= 5251 && $this->calculateTaxableIncome() <= 7800) {
    //         $tax = $this->calculateTaxableIncome() * 0.25 - 565;
    //     } elseif ($this->calculateTaxableIncome() >= 7801 && $this->calculateTaxableIncome() <= 10900) {
    //         $tax = $this->calculateTaxableIncome() * 0.3 - 955;
    //     } elseif ($this->calculateTaxableIncome() > 10901) {
    //         $tax = $this->calculateTaxableIncome() * 0.35 - 1500;
    //     }
    //     return $tax;
    // }

    //Income Tax
    public function calculateIncomeTax()
    {
        $taxBrackets = IncomeTax::all(); 
    
        $taxableIncome = $this->calculateTaxableIncome();
        $tax = 0;
    
        foreach ($taxBrackets as $bracket) {
            if ($bracket->max_income === null) {
                if ($taxableIncome >= $bracket->min_income) {
                    $tax = $taxableIncome * ($bracket->tax_rate / 100) - $bracket->deduction;
                }
            } elseif ($taxableIncome >= $bracket->min_income && $taxableIncome <= $bracket->max_income) {
                $tax = $taxableIncome * ($bracket->tax_rate / 100)  - $bracket->deduction;
                break; 
            }
        }
    
        return $tax;
    }

    //Total Deduction
    public function calculateTotalDeduction()
    {
        $employeeId = $this->employee_id;
        $payrollPeriodId = $this->payroll_period_id;

        $totalDeduction = DeductionTransaction::where('employee_id', $employeeId)
            ->where('payroll_period_id', $payrollPeriodId)
            ->sum('amount_deducted');
        return $totalDeduction;
    }
    //Employee Pension
    public function calculateEmployeePension()
    {
        $payrollPeriod = payrollPeriod::where('id', $this->payroll_period_id)->first();
        $rate =  $payrollPeriod->employeePension->rate;
        $salary = $this->employee->salary;
        $pension = $salary * $rate / 100;
        return $pension;
    }

    public function calculateNetPay()
    {
        $netPay =
            $this->calculateGrossPay() -  $this->calculateTotalDeduction();
        return $netPay;
    }
}
