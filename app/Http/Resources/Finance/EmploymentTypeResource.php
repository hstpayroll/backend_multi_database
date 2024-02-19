<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmploymentTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
