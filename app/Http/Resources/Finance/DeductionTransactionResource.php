<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class DeductionTransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'payroll_period' => new PayrollPeriodResource($this->payrollPeriod),
            'employee' => new EmployeeResource($this->employee),
            'deduction' => new DeductionResource($this->deduction),
            'amount_deducted' => $this->amount_deducted,
            'outstanding_amount' => $this->outstanding_amount,
            'is_partial' => $this->is_partial,
            'is_missed' => $this->is_missed,
            'start_date' => $this->start_date,

        ];
    }
}
