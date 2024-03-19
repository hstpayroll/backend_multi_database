<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Finance\PermissionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $permissions =  Permission::latest()->paginate(10);
        return PermissionResource::collection($permissions);
    }

    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }
}
