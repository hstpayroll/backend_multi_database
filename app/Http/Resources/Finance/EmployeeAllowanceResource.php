<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeAllowanceResource extends JsonResource
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
            'name' => $this->name,
            'taxability' => $this->taxability,
            'tax_free_amount' => $this->tax_free_amount,
            'employee_id' => $this->pivot->employee_id,
            'allowance_type_id' => $this->pivot->allowance_type_id,
            'number_of_days' => $this->pivot->number_of_days,
            'value_in_birr' => $this->pivot->value_in_birr,
        ];
    }
}
