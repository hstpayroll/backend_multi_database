<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Payroll;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Models\Tenant\PayrollPeriod;
use App\Models\Tenant\CompanySetting;
use App\Http\Resources\PayrollResource;
use App\Models\Tenant\AllowanceTransaction;
use App\Models\Tenant\SalaryManagement;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\Tenant\OverTimeCalculation;

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
        $validatedData = $this->validate($request, [
            'employee_id' => 'required|integer|exists:employees,id',
            'payroll_period_id' => 'required|integer|exists:payroll_periods,id',
            'cost_center_id' => 'required|integer|exists:cost_centers,id',
            'number_of_days_worked' => 'required|integer|min:1',
            'basic_salary_arrears' => 'nullable|numeric',
            'actual_basic_salary' => 'nullable|numeric',
            'total_ot_amount' => 'nullable|numeric',
            'total_shift_allowance_amount' => 'nullable|numeric',
            'total_taxable_allowance' => 'nullable|numeric',
            'total_non_taxable_allowance_amount' => 'nullable|numeric',
            'total_allowance' => 'nullable|numeric',
            'total_taxable_income' => 'nullable|numeric',
            'total_non_taxable_income_amount' => 'nullable|numeric',
            'gross_pay' => 'nullable|numeric',
            'income_tax' => 'nullable|numeric',
            'total_deductions' => 'nullable|numeric',
            'employee_pension' => 'nullable|numeric',
            'employee_pension_arrears' => 'nullable|numeric',
            'employee_actual_pension' => 'nullable|numeric',
            'net_pay' => 'nullable|numeric',
        ]);

        // $validatedData = $request->validated();
        $companyMonthlyHours = CompanySetting::where('id', 7)->value('value');

        $number_of_days_worked =  $validatedData['number_of_days_worked'];

        if ($number_of_days_worked  > $companyMonthlyHours) {
            $basic_salary_arrears = 1;
            $actual_basic_salary =  1;
            $employee_pension_arrears =  1;
            $employee_actual_pension =  1;
        } else {
            $basic_salary_arrears =  0;
            $actual_basic_salary =  0;
            $employee_pension_arrears =  0;
            $employee_actual_pension =  0;
        }


        $payroll = new Payroll();
        $payroll->employee_id =  $validatedData['employee_id'];
        $payroll->payroll_period_id =  $validatedData['payroll_period_id'];
        $payroll->cost_center_id =  $validatedData['cost_center_id'];
        $payroll->number_of_days_worked =  $validatedData['number_of_days_worked'];
        $payroll->basic_salary_arrears = $basic_salary_arrears;
        $payroll->actual_basic_salary = $actual_basic_salary;

        $payroll->total_ot_amount =  $payroll->calculateTotalOtAmount();

        $payroll->total_shift_allowance_amount = $payroll->calculateShiftAllowanceAmount();

        $payroll->total_taxable_allowance = $payroll->calculateTotalTaxableAllowanceAmount();;
        $payroll->total_non_taxable_allowance_amount = $payroll->calculateNonTotalTaxableAllowanceAmount();
        $payroll->total_allowance = $payroll->calculateTotalAllowance();

        $payroll->total_taxable_income = $payroll->calculateTaxableIncome();
        $payroll->total_non_taxable_income_amount = $payroll->calculateNonTaxableIncome();

        $payroll->gross_pay = $payroll->calculateGrossPay();
        $payroll->income_tax = $payroll->calculateIncomeTax();

        $payroll->total_deductions = $payroll->calculateTotalDeduction();
        $payroll->employee_pension = $payroll->calculateEmployeePension();

        $payroll->employee_pension_arrears = $employee_pension_arrears;
        $payroll->employee_actual_pension = $employee_actual_pension;
        $payroll->net_pay =  $payroll->calculateNetPay();

        $payroll->save();

        return new PayrollResource($payroll);
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
