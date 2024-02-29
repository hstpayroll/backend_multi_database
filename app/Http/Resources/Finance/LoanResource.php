<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'employee' => new EmployeeResource($this->employee),
            'loan_type' => new LoanTypeResource($this->loanType), // Include full loan type resource
            'amount' => $this->amount,
            'start_date' => $this->start_date,
            'expected_end_date' => $this->expected_end_date,
            'duration_months' => $this->duration_months,
            'description' => $this->description,
            'status' => $this->status == 1 ? 'active' : 'inactive',
            'termination_date' => $this->termination_date,
        ];
    }
}
