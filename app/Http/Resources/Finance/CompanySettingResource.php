<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use App\Http\Resources\Finance\CompanyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanySettingResource extends JsonResource
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
            'company' => CompanyResource::make($this->company),
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
        ];
    }
}