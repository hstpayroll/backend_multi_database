<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EmployeePension;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\StoreEmployeePensionRequest;
use App\Http\Requests\UpdateEmployeePensionRequest;
use App\Http\Resources\Finance\EmployeePensionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class EmployeePensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_pension_index')) {
                $employeePension = employeePension::paginate(10);
                return  employeePensionResource::collection($employeePension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreemployeePensionRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_pension_store')) {
                $employeePension = employeePension::create($request->validated());
                return new employeePensionResource($employeePension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, employeePension $employeePension)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('employee_pension_show')) {
                return new employeePensionResource($employeePension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeePensionRequest $request, employeePension $employeePension)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_pension_update')) {
                // Update the calendar data using the request data
                $employeePension->update($request->all());
                return new employeePensionResource($employeePension);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, employeePension $employeePension)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_pension_destroy')) {
                $employeePension->delete();
                return response()->json(['message' => 'employee Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
