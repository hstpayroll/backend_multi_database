<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class DeductionTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_deduction_id' => $this->mainDeduction->name,
            'name' => $this->name,
            'description' => $this->description,
            'is_continuous' => $this->is_continuous == 1 ? 'yes' : 'no',
            'is_employee_specific' => $this->is_employee_specific == 1 ? 'yes' : 'no',

            'value_type' => $this->is_employee_specific == 1 
                    ? null 
                    : ($this->value_type == 1 ? 'percentage' : 'absolute'),

            'value' => $this->is_employee_specific == 1 ? null : $this->value,
            'status' => $this->status ? 'active' : 'inactive',
        ];        
    }
}
