<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class AllowanceTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payrollPeriods' => PayrollPeriodResource::collection($this->payrollPeriods),
            // 'employees' => EmployeeResource::collection($this->employee),
            // 'allowanceTypes' => AllowanceTypeResource::collection($this->allowanceTypes),
            // 'main_allowance' => new MainAllowanceResource($this->mainAllowance), // Assuming mainAllowance is the relationship with the MainAllowance model
            // 'name' => $this->name,
            // 'taxability' => $this->getTaxabilityLabel(),
            // 'tax_free_amount' => $this->tax_free_amount,
            // 'value_type' => $this->value_type == 0 ? 'amount' : 'Percent',
            // 'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
    protected function getTaxabilityLabel()
    {
        switch ($this->taxability) {
            case 1:
                return 'Tax-free';
            case 2:
                return 'Taxable';
            case 3:
                return 'Partially taxable';
            case 4:
                return 'Tax covered by employer';
            default:
                return null;
        }
    }
}
