<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class DeductionTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'payroll_period' => $this->payrollPeriod->name,
            'employee' => $this->deduction->employee->first_name . ' ' . $this->deduction->employee->father_name . ' ' . $this->deduction->employee->gfather_name,
            'deduction' => $this->deduction->deductionType->name,
            'amount_deducted' => $this->amount_deducted,
            'paid_amount' => $this->paid_amount,
            'outstanding_amount' => $this->outstanding_amount,
        ];
    }
}
