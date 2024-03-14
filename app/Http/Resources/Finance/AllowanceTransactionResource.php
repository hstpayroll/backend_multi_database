<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class AllowanceTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeResource($this->employee),
            'allowanceType' => new AllowanceTypeResource($this->allowanceType),
            'payrollPeriod' => new PayrollPeriodResource($this->payrollPeriod),
            'amount' => $this->amount,
            'taxable_amount' => $this->taxable_amount,
            'non_taxable_amount' => $this->non_taxable_amount,
            'is_day_based' => $this->value_type == 1 ? 'Yes' : 'No',
            'number_of_date' =>  $this->number_of_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
