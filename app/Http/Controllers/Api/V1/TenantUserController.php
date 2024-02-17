<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class TenantUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10); // You can adjust the number of items per page as needed
        return  UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $user->assignRole(['user']);
        $user->givePermissionTo(['edit_profile', 'change_password', 'user_index', 'user_create', 'user_show', 'user_update', 'user_destroy']);
        $user->companies()->attach(1);

        event(new Registered($user));

        Auth::login($user);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            // 'user' => $user,
            'user' =>  new UserResource($user),
            'token' => $token,
            'status' => 200,
            'message' => 'User created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // $user = $user->load(['companies', 'roles', 'permissions']);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->companies()->detach();
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();


        return response()->json([
            'message' => 'User and associated companies and role deleted successfully.',
        ], 204); // No Content response
    }
}
