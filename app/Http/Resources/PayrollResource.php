<?php

namespace App\Http\Resources;

use App\Http\Resources\Finance\CostCenterResource;
use Illuminate\Http\Request;
use App\Http\Resources\Finance\EmployeeResource;
use App\Http\Resources\Finance\OverTimeCalculationResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Finance\PayrollPeriodResource;

class PayrollResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeResource($this->employee),
            'payroll_period_id' => new PayrollPeriodResource($this->payrollPeriod),
            'cost_center_id' => new CostCenterResource($this->costCenter),
            'number_of_days_worked' => $this->number_of_days_worked,
            'salary' => $this->employee->salary,
            'basic_salary_arrears' => $this->basic_salary_arrears,
            'actual_basic_salary' => $this->actual_basic_salary,
            'total_ot_amount' => $this->total_ot_amount,
            'total_shift_allowance_amount' => $this->total_shift_allowance_amount,
            'total_taxable_allowance' => $this->total_taxable_allowance,
            'total_non_taxable_allowance_amount' => $this->total_non_taxable_allowance_amount,
            'total_allowance' => $this->total_allowance,
            'total_taxable_income' => $this->total_taxable_income,
            'total_non_taxable_income_amount' => $this->total_non_taxable_income_amount,
            'gross_pay' => $this->gross_pay,
            'income_tax' => $this->income_tax,
            'total_deductions' => $this->total_deductions,
            'employee_pension' => $this->employee_pension,
            'employee_actual_pension' => $this->employee_actual_pension,
            'net_pay' => $this->net_pay,
        ];
    }
}
