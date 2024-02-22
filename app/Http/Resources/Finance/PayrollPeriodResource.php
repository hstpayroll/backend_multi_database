<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PayrollPeriodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'income_tax_id' => $this->income_tax_id,
            'payroll_type_id' => $this->payroll_type_id,
            'fiscal_year_id' => $this->fiscal_year_id,
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status' => $this->status == 1 ? 'active' : 'inactive',

        ];
    }
}
