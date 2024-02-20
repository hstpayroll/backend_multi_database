<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncomeTaxResource extends JsonResource
{  public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payroll_name_id' => $this->payroll_name_id,
            'payroll_name' => new PayrollNameResource($this->payrollName),
            'name' => $this->name,
            'min_income' => $this->min_income,
            'max_income' => $this->max_income,
            'tax_rate' => $this->tax_rate,
            'deduction' => $this->deduction,
            'details' => $this->details,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
