<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Payroll;
use App\Http\Controllers\Controller;
use App\Http\Resources\PayrollResource;
use Illuminate\Support\Facades\Validator;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payrolls = Payroll::all();
        return PayrollResource::collection($payrolls);
    }

    public function store(Request $request)
    {
        $validationRules = [
            'employee_id' => ['required', 'exists:employees,id'],
            'payroll_period_id' => ['required', 'exists:payroll_periods,id'],
            'cost_center_id' => ['required', 'exists:cost_centers,id'],
            'number_of_days_worked' => ['required', 'integer', 'min:0', 'max:60'], // Ensures non-negative days
            'basic_salary_arrears' => ['numeric', 'between:0,999999.99'], // Limit to 2 decimal places
            'actual_basic_salary' => ['numeric', 'between:0,999999.99'],
            'total_ot_amount' => ['numeric', 'between:0,999999.99'],
            'total_shift_allowance_amount' => ['numeric', 'between:0,999999.99'],
            'total_on_call_allowance_amount' => ['numeric', 'between:0,999999.99'],
            'gross_pay' => ['numeric', 'between:0,999999.99'],  // Can add custom logic for gross pay calculation
            'total_taxable_income' => ['numeric', 'between:0,999999.99'],
            'taxable_income_exclude_motor_vehicle' => ['numeric', 'between:0,999999.99'],
            'income_tax' => ['numeric', 'between:0,999999.99'],  // Can add custom logic for tax calculation
            'pension' => ['numeric', 'between:0,999999.99'],
            'pension_arrears' => ['numeric', 'between:0,999999.99'],
            'actual_pension' => ['numeric', 'between:0,999999.99'],
            'total_deductions' => ['numeric', 'between:0,999999.99'],  // Can add custom logic for deduction calculation
            'net_pay' => ['numeric', 'between:0,999999.99'],  // Can add custom logic for net pay calculation
        ];
        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            dd("the error message");
        } else {
            Payroll::create($validator->validated());
        }
    }


    public function show(Payroll $payroll)
    {
        //
    }


    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    public function destroy(Payroll $payroll)
    {
        //
    }
}
