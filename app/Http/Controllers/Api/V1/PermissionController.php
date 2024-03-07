<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finance\PermissionResource;
use Spatie\Permission\Models\Permission;
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
        $permissions =  Permission::paginate(10);

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
}
