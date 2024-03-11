<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryManagementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeResource($this->employee),
            'reason' => $this->reason,
            'old_salary' => $this->old_salary,
            'new_salary' => $this->new_salary,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
