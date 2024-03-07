<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreModelHasPermissionRequest;
use App\Http\Requests\UpdateModelHasPermissionRequest;
use App\Http\Resources\Finance\RoleAndPermissionResource;
use App\Http\Resources\Finance\StoreModelHasPermissionResource;
use App\Models\User;
use Illuminate\Http\Response;

class ModelHasPermissionController extends Controller
{
    public function index()
    {
        // $modelHasPermissions = ModelHasPermission::all();

        // return response()->json($modelHasPermissions, Response::HTTP_OK);
    }

    public function store(StoreModelHasPermissionRequest $request)
    {
        $validatedData = $request->validated();
        $user = User::findOrFail($validatedData['user_id']);
        $user->syncRoles($validatedData['roles']);
        $user->syncPermissions($validatedData['permissions']);
        return new StoreModelHasPermissionResource($user, $user);
    }

    public function show($id)
    {
        $user = User::with('roles', 'permissions')->findOrFail($id);
        return new StoreModelHasPermissionResource($user, $user);
    }

    public function update(UpdateModelHasPermissionRequest $request, $id)
    {
        $validatedData = $request->validated();


        $user = User::findOrFail($id);
        $user->syncRoles($validatedData['roles']);
        $user->syncPermissions($validatedData['permissions']);

        $updatedUser = User::with('roles', 'permissions')->findOrFail($id)->firstOrFail();

        return new StoreModelHasPermissionResource($updatedUser,$updatedUser);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->permissions()->detach();
        return response()->json(['message' => 'Roles and permissions have been removed from the user.'], Response::HTTP_OK);
    }
}
