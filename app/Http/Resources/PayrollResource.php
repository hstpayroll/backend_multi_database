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
            'employee_id' => new EmployeeResource($this->employee),
            'payroll_period_id' => new PayrollPeriodResource($this->payrollPeriod),
            'cost_center_id' => new CostCenterResource($this->costCenter),
            'number_of_days_worked' => $this->number_of_days_worked,
            'salary' => $this->number_of_days_worked,
            'basic_salary_arrears' => $this->basic_salary_arrears,
            'actual_basic_salary' => $this->actual_basic_salary,
            'sip_payment' => $this->sip_payment,
            'bonus' => $this->bonus,
            'annual_leave_payment' => $this->annual_leave_payment,
            'review_allowance' => $this->review_allowance,
        ];
    }
}
