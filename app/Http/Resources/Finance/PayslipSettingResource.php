<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Finance\CompanyResource;

class PayslipSettingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'company' => new CompanyResource($this->company),
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value == 1 ? true : false,
        ];
    }
}
