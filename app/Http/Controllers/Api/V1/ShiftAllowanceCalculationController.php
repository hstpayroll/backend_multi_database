<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\ShiftAllowanceCalculation;
use App\Http\Requests\StoreShiftAllowanceCalculationRequest;
use App\Http\Requests\UpdateShiftAllowanceCalculationRequest;
use App\Http\Resources\Finance\ShiftAllowanceCalculationResource;
use App\Models\Tenant\Employee;
use App\Models\Tenant\ShiftAllowanceType;


class ShiftAllowanceCalculationController extends Controller
{
    public function index()
    {
        $shiftAllowanceCalculations = ShiftAllowanceCalculation::paginate(10);
        return ShiftAllowanceCalculationResource::collection($shiftAllowanceCalculations);
    }

    public function store(StoreShiftAllowanceCalculationRequest $request)

    {
        $validatedData = $request->validated();

        $employee = Employee::where('id', $validatedData['employee_id'])->first();

        if ($employee && $employee->Salary) {
            $allowanceType = ShiftAllowanceType::findOrFail($validatedData['shift_allowance_type_id']);
            $rate = $allowanceType->rate / 100;
            $value = $employee->Salary * $rate;

            $shiftAllowanceCalculation = ShiftAllowanceCalculation::create([
                'employee_id' => $validatedData['employee_id'],
                'shift_allowance_type_id' => $validatedData['shift_allowance_type_id'],
                'payroll_period_id' => $validatedData['payroll_period_id'],
                'value' => $value,
            ]);

            return new ShiftAllowanceCalculationResource($shiftAllowanceCalculation);
        } else {
            return response()->json(['error' => 'Employee not found or salary not set'], 404);
        }
    }


    public function show($id)
    {
        $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($id);
        return new ShiftAllowanceCalculationResource($shiftAllowanceCalculation);
    }

    public function update(UpdateShiftAllowanceCalculationRequest $request, $id)
    {
        $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($id);
        $validatedData = $request->validated();
        $shiftAllowanceCalculation->update($validatedData);
        return new ShiftAllowanceCalculationResource($shiftAllowanceCalculation);
    }

    public function destroy($id)
    {
        $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($id);
        $shiftAllowanceCalculation->delete();
        return response()->noContent();
    }
}
