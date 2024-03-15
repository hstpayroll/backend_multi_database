<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class shiftAllowanceCalculationByEmployeeResource extends JsonResource
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
            'shiftAllowanceTypes' => $this->shiftAllowanceType->name,
            'value' => $this->value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
