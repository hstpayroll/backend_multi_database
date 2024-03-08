<?php

namespace App\Http\Resources\Finance;

use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreModelHasPermissionResource extends JsonResource
{
    protected $user;

    public function __construct($resource, $user)
    {
        parent::__construct($resource);
        $this->user = $user;
    }

    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->user),
            'roles' => RoleResource::collection($this->user->roles),
            'permissions' => PermissionResource::collection($this->user->permissions),
        ];
    }
}
