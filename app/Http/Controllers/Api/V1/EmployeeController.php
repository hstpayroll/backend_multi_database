<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Models\Tenant\Position;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
use App\Models\Tenant\SubDepartment;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\Finance\EmployeeResource;
use App\Http\Resources\Finance\AllowanceTypeResource;
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

                return EmployeeResource::collection($employees);
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
                $employees = Employee::latest()->select('id', 'emp_id',  'first_name', 'father_name', 'gfather_name')->paginate(10);
                return EmployeeResourceRefactor::collection($employees);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function allowanceTypes(Employee $employee)
    {
        $allowanceTypes = $employee->allowanceTypes;
        return response()->json([
            'data' => AllowanceTypeResource::collection($allowanceTypes)
        ]);
    }

    public function storeAllowanceTypes(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'allowance_type_id' => 'required|exists:allowance_types,id',
            'number_of_days' => 'required|integer',
            'value_in_birr' => 'nullable|numeric',
        ]);
        $recordExist = $employee->allowanceTypes()
            ->where('allowance_type_id',  $data['allowance_type_id'])
            ->first();

        if ($recordExist) {
            return response()->json([
                'message' => 'Duplicate allowance type assignment detected for this employee.',
                'errors' => ['allowance_type_id' => ['Duplicate assignment.']],
            ], 422);
        }
        $existingRecord = $employee->allowanceTypes()->attach([
            'allowance_type_id' => $data['allowance_type_id'],
        ], [
            'number_of_days' => $data['number_of_days'],
            'value_in_birr' => $data['value_in_birr']
        ]); // Include validated data

        return response()->json([
            'message' => 'Allowance type assigned successfully.',
        ]);
    }
    public function updateAllowanceTypes(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'allowance_type_id' => 'required|integer',
            'number_of_days' => 'required|integer',
            'value_in_birr' => 'nullable|numeric',
        ]);

        $existingRecord = $employee->allowanceTypes()->syncWithPivotValues([
            'allowance_type_id' => $data['allowance_type_id'],
        ], [
            'number_of_days' => $data['number_of_days'],
            'value_in_birr' => $data['value_in_birr']
        ]); // Include validated data

        return response()->json([
            'message' => 'Allowance type assigned successfully.',
        ]);
    }
    public function destroyAllowanceTypes(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'allowance_type_id' => 'integer|exists:allowance_types,id',
        ]);

        $employee->allowanceTypes()->detach($data['allowance_type_id']);

        return response()->json([
            'message' => 'Selected allowance types detached from employee ' . $employee->id,
        ]);
    }
    public function totalDeductions(Employee $employee)
    {
        $allowanceTypes = $employee->allowanceTypes;
        $allowanceTypes =  collect($allowanceTypes);
        return response()->json([
            'data' => AllowanceTypeResource::collection($allowanceTypes)
        ]);
    }
}
