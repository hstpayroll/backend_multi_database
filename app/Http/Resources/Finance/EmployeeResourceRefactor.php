<?php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResourceRefactor extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'emp_id' => $this->emp_id,
            'full_name' => $this->fullname,
        ];
    }
}
