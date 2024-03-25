<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finance\EmployeeAllowanceResource;
use App\Models\Tenant\AllowanceType;

class EmployeeAllowanceTypeController extends Controller
{
    public function index(Employee $employee)
    {
        $allowanceTypes = $employee->allowanceTypes()->withPivot('number_of_days', 'value_in_birr')->paginate(10);
        return EmployeeAllowanceResource::collection($allowanceTypes);
    }

    public function store(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'allowance_type_id' => 'required|exists:allowance_types,id',
            'number_of_days' => 'required|integer',
            'value_in_birr' => 'required|numeric',
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
        $employee->allowanceTypes()->attach([
            'allowance_type_id' => $data['allowance_type_id'],
        ], [
            'number_of_days' => $data['number_of_days'],
            'value_in_birr' => $data['value_in_birr']
        ]); // Include validated data
        return response()->json([
            'message' => 'Allowance type assigned successfully.',
        ]);
    }

    public function show(Employee $employee, AllowanceType $allowanceType)
    {
        $allowanceTypeWithPivot = $employee->allowanceTypes()
            ->withPivot('number_of_days', 'value_in_birr')
            ->wherePivot('allowance_type_id', $allowanceType->id)
            ->first();

        if (!$allowanceTypeWithPivot) {
            return response()->json(['error' => 'Employee allowance type not found.'], 400);
        }
        return new EmployeeAllowanceResource($allowanceTypeWithPivot);
    }
    public function update(Request $request, Employee $employee, AllowanceType $allowanceType)
    {
        $data = $request->validate([
            'number_of_days' => 'required|integer',
            'value_in_birr' => 'required|numeric',
        ]);
        $employee->allowanceTypes()->updateExistingPivot($allowanceType->id, $data);
        $updatedPivot = $employee->allowanceTypes->find($allowanceType->id);

        return new EmployeeAllowanceResource($updatedPivot);
    }

    public function destroy(Employee $employee, AllowanceType $allowanceType)
    {
        $employee->allowanceTypes()->detach($allowanceType->id);

        return response()->json([
            'message' => 'Selected allowance types detached from employee ' . $employee->id,
        ]);
    }
}
