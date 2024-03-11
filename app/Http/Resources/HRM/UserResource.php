<?php

namespace App\Http\Resources\HRM;

use App\Http\Resources\Finance\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'companies' => CompanyResource::collection($this->companies),
            'roles' => $this->roles,
            'permissions' => $this->permissions,
        ];
    }
}
