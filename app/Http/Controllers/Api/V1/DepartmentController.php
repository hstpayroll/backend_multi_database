<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\Finance\DepartmentResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('department_index')) {
                $departments = Department::latest()->paginate(10);
                return DepartmentResource::collection($departments);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreDepartmentRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('department_store')) {
                $validatedData = $request->validated();
                $department = Department::create($validatedData);
                return new DepartmentResource($department);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Department $department)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('department_show')) {
                return new DepartmentResource($department);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('department_update')) {
                $validatedData = $request->validated();
                $department->update($validatedData);
                return new DepartmentResource($department);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Department $department)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('department_destroy')) {
                $department->delete();
                return response()->json(['message' => 'Department deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
