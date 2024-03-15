<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class overtimeCalculationByEmployeeResource extends JsonResource
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
            'payrollPeriods' => $this->payrollPeriod->name, // Only send the 'name' attribute
            // 'employees' => new EmployeeResource($this->employee),
            'overtimeTypes' => $this->overtimeType->name,
            'ot_hour' => $this->ot_hour,
            'ot_value' => $this->ot_value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
