<?php

// File: app/Http/Resources/Finance/PayrollTypeResource.php

namespace App\Http\Resources\Finance;

use Illuminate\Http\Resources\Json\JsonResource;

class PayrollTypeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
