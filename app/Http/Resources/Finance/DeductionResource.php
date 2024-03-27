<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeductionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee->first_name . ' ' . $this->employee->father_name . ' ' . $this->employee->gfather_name,
            'deduction_type' => $this->deductionType->name,
            'static_amount' => $this->static_amount,
            'total_paid_amount' => $this->total_paid_amount,
            'monthly_payment' => $this->monthly_payment,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];                
    }
}
