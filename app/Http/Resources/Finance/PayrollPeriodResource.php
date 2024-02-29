<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollPeriodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'income_tax_id' => $this->income_tax_id,
            'income_tax' => new IncomeTaxResource($this->incomeTax),
            'payroll_type' => new PayrollTypeResource($this->payrollType),
            'fiscal_year' => new FiscalYearResource($this->fiscalYear),
            'name' => $this->name,
            'year' => $this->year,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',

        ];
    }
}
