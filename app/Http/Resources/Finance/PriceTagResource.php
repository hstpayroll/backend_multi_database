<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class PriceTagResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'package_name' => $this->package_name,
            'minimum_employee' => $this->minimum_employee,
            'maximum_employee' => $this->maximum_employee,
            'price' => $this->price,
            'description' => $this->description,
            'status' => $this->status === 1 ? 'active' : 'closed',
            'created_at' => $this->created_at,
        ];
    }
}
