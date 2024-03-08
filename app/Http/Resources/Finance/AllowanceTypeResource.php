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
            'main_allowance' =>  MainAllowanceResource::collection($this->mainAllowance), // Assuming mainAllowance is the relationship with the MainAllowance model
            'name' => $this->name,
            'taxability' => $this->getTaxabilityLabel(),
            'tax_free_amount' => $this->tax_free_amount,
            'value_type' => $this->value_type == 0 ? 'amount' : 'Percent',
            'value' => $this->value,
            'status' => $this->status == 1 ? 'active' : 'inactive',
        ];
    }
    protected function getTaxabilityLabel()
    {
        switch ($this->taxability) {
            case 1:
                return 'Tax-free';
            case 2:
                return 'Taxable';
            case 3:
                return 'Partially taxable';
            case 4:
                return 'Tax covered by employer';
            default:
                return null;
        }
    }
}
