<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finance\RoleResource;
use Spatie\Role\Exceptions\RoleDoesNotExist;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        $role = Role::create($request->all());
        return new RoleResource($role);
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);
        $role->update($request->all());
        return new RoleResource($role);
    }
    public function destroy(Role $role)
    {
        // $role = Role::where('id', $id)
        // ->where('guard_name', 'sanctum')
        // ->firstOrFail();

        // Detach permissions associated with the role
        $role->permissions()->detach();

        $role->delete();
        dd("deletd");
        return response()->json([
            'message' => 'Role deleted successfully!',
        ], 200);
    }
}
