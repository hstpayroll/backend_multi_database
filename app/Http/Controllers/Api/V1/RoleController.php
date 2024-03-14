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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }

    public function grantRole(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $RoleID = $request->input('Role_id');
        $Role = Role::find($RoleID);

        if (!$Role) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $user->giveRoleTo($Role);

        return response()->json(['message' => 'Role granted successfully']);
    } 

    public function revokeRole(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $RoleID = $request->input('Role_ID'); // Change input name to 'Role_name'
        $user->revokeRoleTo($RoleID); // Revoke Role by name

        return response()->json(['message' => 'Role revoked successfully']);
    }

    public function getUserRoles($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $Roles = $user->roles->pluck('name')->toArray();

        return response()->json(['Roles' => $Roles]);
    }

}
