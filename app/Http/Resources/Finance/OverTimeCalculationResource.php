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
            'payrollPeriods' => new PayrollPeriodResource($this->payrollPeriod),
            'employees' => new EmployeeResource($this->employee),
            'overtimeTypes' => new OverTimeTypeResource($this->overtimeType),
            'ot_hour' => $this->ot_hour,
            'ot_value' => $this->ot_value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
