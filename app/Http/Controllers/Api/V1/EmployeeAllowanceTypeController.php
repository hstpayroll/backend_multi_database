<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finance\AllowanceTypeResource;
use App\Http\Resources\Finance\EmployeeAllowanceResource;
use App\Http\Resources\Finance\EmployeeAllowanceTypeResource;
use App\Models\Tenant\AllowanceType;

class EmployeeAllowanceTypeController extends Controller
{
    public function index(Employee $employee)
    {
        $allowanceTypes = $employee->allowanceTypes()->withPivot('number_of_days', 'value_in_birr')->get();
        return EmployeeAllowanceResource::collection($allowanceTypes);
    }

    public function store(Request $request, Employee $employee)
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
            'value_in_birr' => 'nullable|numeric',
        ]);
        $allowanceType =  $employee->allowanceTypes()->updateExistingPivot($allowanceType->id, $data);

        // return new EmployeeAllowanceResource($allowanceType);
        return new EmployeeAllowanceResource($allowanceType);
    }

    public function destroy(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'allowance_type_id' => 'integer|exists:allowance_types,id',
        ]);

        $employee->allowanceTypes()->detach($data['allowance_type_id']);

        return response()->json([
            'message' => 'Selected allowance types detached from employee ' . $employee->id,
        ]);
    }
}
