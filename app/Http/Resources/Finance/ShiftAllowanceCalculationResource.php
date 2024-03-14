<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class ShiftAllowanceCalculationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
            'employee' => new EmployeeResource($this->employee),
            'shift_allowance_type' => new ShiftAllowanceTypeResource($this->shiftAllowanceType),
            'payroll_period' => new PayrollPeriodResource($this->payrollPeriod),
        ];
    }
}
