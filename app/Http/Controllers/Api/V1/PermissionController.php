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

        // try {
        //     $user = $request->user();
        //     if ($user->hasPermissionTo('payslip_setting_index')) {
        $permissions =  Permission::latest()->paginate(10);

        // dd($payslipSettings);
        return PermissionResource::collection($permissions);
        //     } else {
        //         return response()->json(['message' => 'Unauthorized for this task'], 403);
        //     }
        // } catch (PermissionDoesNotExist $exception) {
        //     return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        // }
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

    public function grantPermission(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $permissionID = $request->input('permission_id');
        $permission = Permission::find($permissionID);

        if (!$permission) {
            return response()->json(['error' => 'Permission not found'], 404);
        }

        $user->givePermissionTo($permission);

        return response()->json(['message' => 'Permission granted successfully']);
    } 

    public function revokePermission(Request $request, $userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $permissionID = $request->input('permission_ID'); // Change input name to 'permission_name'
        $user->revokePermissionTo($permissionID); // Revoke permission by name

        return response()->json(['message' => 'Permission revoked successfully']);
    }

    public function getUserPermissions($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found for ID ' . $userId], 404);
        }

        $permissions = $user->getAllPermissions()->pluck('name');

        return response()->json(['permissions' => $permissions]);
    }
       
}
