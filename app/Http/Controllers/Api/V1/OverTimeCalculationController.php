<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Models\Tenant\OverTimeType;
use App\Http\Controllers\Controller;
use App\Models\Tenant\PayrollPeriod;
use App\Models\Tenant\OverTimeCalculation;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Resources\Finance\OverTimeCalculationResource;
use App\Models\Tenant\CompanySetting;

class OverTimeCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_index')) {
                $overTimeDeductions = OverTimeCalculation::latest()->paginate(10);
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
        $rules = [
            'employee_id' => 'required|integer|exists:employees,id',
            'over_time_type_id' => 'required|integer|exists:over_time_types,id',
            'payroll_period_id' => 'required|integer|exists:payroll_periods,id',
            'ot_hour' => 'required|numeric|min:1', // Ensures non-negative overtime hours
        ];
        $validatedData = $request->validate($rules);
        $employee = Employee::find($validatedData['employee_id']);
        $employee_latest_salary =  $employee->salary;
        $company_monthly_hours = CompanySetting::where('id', 7)->value('value');
        $employee_hourly_salary =   $employee_latest_salary / $company_monthly_hours;
        $ot_hours = $validatedData['ot_hour'];
        $overtime_type_rate = OverTimeType::where('id', $request->over_time_type_id)->pluck('rate')->first();
        $ot_value =  $ot_hours *   $overtime_type_rate *   $employee_hourly_salary;
        $payrollPeriod = PayrollPeriod::find($validatedData['payroll_period_id']);

        // Assuming you have a model for overtime records
        $overtime = new OverTimeCalculation();
        $overtime->employee_id = $employee->id;
        $overtime->over_time_type_id =  $validatedData['over_time_type_id'];
        $overtime->payroll_period_id = $validatedData['payroll_period_id'];
        $overtime->ot_hour = $validatedData['ot_hour'];
        $overtime->ot_value =  $ot_value;
        $overtime->save();

        return new OverTimeCalculationResource($overtime);
    }

    /**
     * Display the specified resource.
     */
    public function show(OverTimeCalculation $overTimeCalculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OverTimeCalculation $overTimeCalculation)
    {
        //
    }
}
