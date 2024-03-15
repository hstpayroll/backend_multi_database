<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Models\Tenant\Position;
use App\Http\Controllers\Controller;
use App\Models\Tenant\SubDepartment;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\Finance\EmployeeResource;
use App\Http\Resources\Finance\EmployeeResourceRefactor;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_index')) {
                $employees = Employee::latest()->paginate(10);
                // return EmployeeResource::collection($employees);
                return EmployeeResource::collection($employees);
                // $includeRelationships = false;
                // return EmployeeResource::collection($employees)->additional(['includeRelationships' => $includeRelationships]);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreEmployeeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_store')) {
                $validatedData = $request->validated();
                $employee = Employee::create($validatedData);
                return new EmployeeResource($employee);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function show(Request $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_show')) {
                return new EmployeeResource($employee);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_update')) {
                $validatedData = $request->validated();
                $employee->update($validatedData);
                return new EmployeeResource($employee);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_destroy')) {
                $employee->delete();
                return response()->json(null, 204);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
    public function employeeDepartment(Request $request, Employee $employee)
    {
        $department_id = $request->department_id;
        $subDepartment = SubDepartment::where('department_id', $department_id)->get();
        return response()->json([
            'status' => 200,
            'data' => $subDepartment
        ]);
    }
    public function employeePosition(Request $request,)
    {
        $sub_department_id = $request->sub_department_id;
        $position = Position::where('sub_department_id', $sub_department_id)->get();
        return response()->json([
            'status' => 200,
            'data' => $position
        ]);
    }


    public function refactorEmployeeList(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('employee_index')) {
                $employees = Employee::latest()->paginate(10);

                // // Create custom data
                // $includeRelationships = collect(['isIncludedRelations' => true]);

                // // Merge paginated data with custom data
                // $data = $includeRelationships->merge($employees);
                // // dd("the merged data",  $data);
                // // Return the resource
                return EmployeeResourceRefactor::collection($employees);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
