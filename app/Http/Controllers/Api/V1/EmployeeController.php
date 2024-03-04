<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\Finance\EmployeeResource;
use App\Models\Tenant\Employee;
use App\Models\Tenant\Position;
use App\Models\Tenant\SubDepartment;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->hasPermissionTo('index employee')) {
            $employees = Employee::paginate(10);
            return EmployeeResource::collection($employees);

            // return response()->json(['message' => 'Action performed successfully']);
        } else {
            // User doesn't have permission, return unauthorized response
            return response()->json(['message' => 'Unauthorized'], 403);
        }
    }

    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $employee = Employee::create($validatedData);
        return new EmployeeResource($employee);
    }

    public function show(Employee $employee)
    {
        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validatedData = $request->validated();
        $employee->update($validatedData);
        return new EmployeeResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
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
}
