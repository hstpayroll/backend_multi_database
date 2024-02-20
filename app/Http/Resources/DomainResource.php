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
        $domainWithoutSubdomain = str_replace('.localhost', '', $this->domain);

        return [
            'domain' => $domainWithoutSubdomain, //mukera.localhost is change to mukra only here

        ];
    }
}
