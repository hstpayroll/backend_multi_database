<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeductionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'deduction_type' => new DeductionTypeResource($this->deductionType), // Assuming DeductionTypeResource exists
            'value_type' => $this->value_type,
            'value' => $this->value,
            'status' => $this->status == 1 ? 'active' : 'inactive',

        ];
    }
}
d