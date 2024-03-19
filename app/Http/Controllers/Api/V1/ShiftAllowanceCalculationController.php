<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Models\Tenant\ShiftAllowanceType;
use App\Models\Tenant\ShiftAllowanceCalculation;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Requests\StoreShiftAllowanceCalculationRequest;
use App\Http\Requests\UpdateShiftAllowanceCalculationRequest;
use App\Http\Resources\Finance\ShiftAllowanceCalculationResource;
use App\Http\Resources\Finance\shiftAllowanceCalculationByEmployeeResource;


class ShiftAllowanceCalculationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_index')) {
                $shiftAllowanceCalculations = ShiftAllowanceCalculation::paginate(10);
            return ShiftAllowanceCalculationResource::collection($shiftAllowanceCalculations);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreShiftAllowanceCalculationRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_store')) {
            $validatedData = $request->validated();

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
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);

        }
    }

    public function show(Request $request, ShiftAllowanceCalculation $overTimeCalculation)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_show')) {
                $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($overTimeCalculation);
                return new ShiftAllowanceCalculationResource($shiftAllowanceCalculation);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateShiftAllowanceCalculationRequest $request, $id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_update')) {
                $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($id);
                $validatedData = $request->validated();
                $shiftAllowanceCalculation->update($validatedData);
                return new ShiftAllowanceCalculationResource($shiftAllowanceCalculation);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, ShiftAllowanceCalculation $ShiftAllowanceCalculation)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_destroy')) {
                $shiftAllowanceCalculation = ShiftAllowanceCalculation::findOrFail($ShiftAllowanceCalculation);
            $shiftAllowanceCalculation->delete();
            return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function showShiftAllowanceCalculationByEmployee(Request $request, $employee_id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('shift_Allowance_recored_by_employee')) {
                $overtimeRecords = ShiftAllowanceCalculation::where('employee_id', $employee_id)->get();
                return  shiftAllowanceCalculationByEmployeeResource::collection($overtimeRecords);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }

    }
}
