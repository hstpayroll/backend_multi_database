<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OverTimeCalculationResource extends JsonResource
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
            'payrollPeriods' => PayrollPeriodResource::collection($this->payrollPeriods),
            'employees' => EmployeeResource::collection($this->employees),
            'overtimeTypes' => OverTimeTypeResource::collection($this->overtimeTypes),
            'ot_hour' => $this->ot_hour,
            'ot_value' => $this->ot_value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
