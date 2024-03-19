<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientRequestResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'company_name' => $this->company_name,
            'total_number_of_employees' => $this->total_number_of_employees,
            'country' => $this->country,
            'city' => $this->city,
            'sub_city' => $this->sub_city,
            'created_at' => $this->created_at,
        ];
    }
}