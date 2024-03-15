<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Models\Tenant\OverTimeType;
use App\Http\Controllers\Controller;
use App\Models\Tenant\PayrollPeriod;
use App\Models\Tenant\CompanySetting;
use App\Models\Tenant\OverTimeCalculation;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Resources\Finance\OverTimeCalculationResource;

class OverTimeCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_calculation_index')) {
                $overTimeDeductions = OverTimeCalculation::latest()
                    ->active()
                    ->paginate(10);
                return OverTimeCalculationResource::collection($overTimeDeductions);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_calculation_store')) {
                $rules = [
                    'employee_id' => 'required|integer|exists:employees,id',
                    'over_time_type_id' => 'required|integer|exists:over_time_types,id',
                    'payroll_period_id' => 'required|integer|exists:payroll_periods,id',
                    'ot_hour' => 'required|numeric|min:1', // Ensures non-negative overtime hours
                ];
                $validatedData = $request->validate($rules);
                $employee = Employee::find($validatedData['employee_id'])->first();
                // dd($employee);
                $employee_latest_salary =  $employee->salary;
                $company_monthly_hours = CompanySetting::where('id', 7)->value('value');
                $employee_hourly_salary =   $employee_latest_salary / $company_monthly_hours;
                $ot_hours = $validatedData['ot_hour'];
                $overtime_type_rate = OverTimeType::where('id', $request->over_time_type_id)->pluck('rate')->first();
                $ot_value =  $ot_hours *   $overtime_type_rate *   $employee_hourly_salary;
                $payrollPeriod = PayrollPeriod::find($validatedData['payroll_period_id']);

                // Assuming you have a model for overtime records
                $overTimeCalculation = new OverTimeCalculation();
                $overTimeCalculation->employee_id = $employee->id;
                $overTimeCalculation->over_time_type_id =  $validatedData['over_time_type_id'];
                $overTimeCalculation->payroll_period_id = $validatedData['payroll_period_id'];
                $overTimeCalculation->ot_hour = $validatedData['ot_hour'];
                $overTimeCalculation->ot_value =  $ot_value;
                $overTimeCalculation->save();
                return new OverTimeCalculationResource($overTimeCalculation);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
    public function show(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_calculation_show')) {
                return new OverTimeCalculationResource($overTimeCalculation);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_calculation_update')) {
                $validatedData = $this->validate($request, [
                    'employee_id' => 'required|integer|exists:employees,id',
                    'over_time_type_id' => 'required|integer|exists:over_time_types,id',
                    'payroll_period_id' => 'required|integer|exists:payroll_periods,id',
                    'ot_hour' => 'required|numeric|min:1',
                ]);

                $employee = Employee::findOrFail($validatedData['employee_id']);
                $employeeLatestSalary = $employee->salary;
                $companyMonthlyHours = CompanySetting::where('id', 7)->value('value');
                $employeeHourlySalary = $employeeLatestSalary / $companyMonthlyHours;
                $otHours = $validatedData['ot_hour'];
                $overtimeTypeRate = OverTimeType::findOrFail($validatedData['over_time_type_id'])->rate;
                $otValue = $otHours * $overtimeTypeRate * $employeeHourlySalary;
                $payrollPeriod = PayrollPeriod::findOrFail($validatedData['payroll_period_id']);

                $overTimeCalculation->update([
                    'employee_id' => $employee->id,
                    'over_time_type_id' => $validatedData['over_time_type_id'],
                    'payroll_period_id' => $validatedData['payroll_period_id'],
                    'ot_hour' => $validatedData['ot_hour'],
                    'ot_value' => $otValue,
                ]);
                return new OverTimeCalculationResource($overTimeCalculation);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_calculation_update_destroy')) {
                $overTimeCalculation->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function showOvetimeCalculationByEmployee(Request $request, $employee_id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_recored_by_employee')) {
                $overtimeRecords = OverTimeCalculation::where('employee_id', $employee_id)->get();
                return  OverTimeCalculationResource::collection($overtimeRecords);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
        
    }
}
