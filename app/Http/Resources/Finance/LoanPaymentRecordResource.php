<?php

namespace App\Http\Resources\Finance;

use App\Models\Tenant\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanPaymentRecordResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'payrollPeriod' => new PayrollPeriodResource($this->payrollPeriod),
            'loan' => new LoanResource($this->loan),
            'amount_payed' => $this->amount_payed,
            'outstanding_amount' => $this->outstanding_amount,
            'is_partial' => $this->is_partial,
            'is_missed' => $this->is_missed,
        ];
    }
}
