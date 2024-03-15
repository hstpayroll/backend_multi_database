<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\Finance\TenantUserResource;

class TenantUserController extends Controller
{
    public function auth_user_tenant()
    {
        auth()->user();
        return response()->json([
            'message' => 'success',
            'code' => '200',
        ]);
    }
    public function index()
    {
        $users = User::with(['roles', 'permissions'])->latest()->paginate(10);
        return  TenantUserResource::collection($users);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return response()->json([
            'user' =>  new TenantUserResource($user),
            'status' => 200,
            'message' => 'User created successfully',
        ]);
    }

    public function show(User $user)
    {
        $user = $user->load(['roles', 'permissions']);
        return new TenantUserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return response()->json([
            'user' =>  new TenantUserResource($user),
            'status' => 200,
            'message' => 'User created successfully',
        ]);
    }
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
        return response()->noContent();
    }
    public function assignRole(Request $request, User $user)
    {
        $this->validate($request, [
            'roles' => 'required|array|min:1',
            'roles.*' => 'integer|exists:roles,id',
        ]);
        $roles = Role::whereIn('id', $request->input('roles'))->get();
        $user->syncRoles($roles);
        return response()->json([
            'message' => 'Roles assigned successfully!',
            'user' => new TenantUserResource($user),
        ], 200);
    }
    public function removeRole(Request $request, User $user)
    {
        $this->validate($request, [
            'role_id' => 'required|integer|exists:roles,id', // Ensure a valid role ID is provided
        ]);

        $roleId = $request->input('role_id');
        $role = Role::findOrFail($roleId);
        $user->removeRole($role);
        return response()->json([
            'message' => 'Role removed successfully!',
            'user' => new TenantUserResource($user),
        ], 200);
    }
}
