<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
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
            'domain' => $this->domain,
            'tenant_id' => TenantResource::collection($this->tenants),
            // 'tenant' => TenantResource::collection($this->tenant),
        ];
    }
}
