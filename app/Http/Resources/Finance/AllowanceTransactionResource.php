<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class AllowanceTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employees' => new EmployeeResource($this->employee),
            'allowanceTypes' => new OverTimeTypeResource($this->overtimeType),
            'payrollPeriods' => new PayrollPeriodResource($this->payrollPeriod),
            'amount' => $this->amount,
            'taxable_amount' => $this->taxable_amount,
            'tax_free_amount' => $this->tax_free_amount,
            'is_day_based' => $this->value_type == 0 ? 'Yes' : 'No',
            'start_date' =>  $this->start_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
