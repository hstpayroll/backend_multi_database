<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllowanceTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_allowance' => new MainAllowanceResource($this->mainAllowance), // Assuming mainAllowance is the relationship with the MainAllowance model
            'name' => $this->name,
            'taxability' => $this->taxability,
            'tax_free_amount' => $this->tax_free_amount,
            'value_type' => $this->value_type,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
}
