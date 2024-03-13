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
            'employee_id' => 'required|exists:employees,id',
            'payroll_period_id' => ['required', 'exists:payroll_periods,id'],
            'cost_center_id' => ['required', 'exists:cost_centers,id'],
            'number_of_days_worked' => ['required', 'integer', 'min:0', 'max:60'], // Ensures non-negative days
            'basic_salary_arrears' => ['nullable', 'numeric'],
            'actual_basic_salary' =>  ['nullable', 'numeric'],
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
        ]);

        // $validatedData = $request->validated();
        $employee = Employee::where('id', $validatedData['employee_id'])->first();
        $employee_salary = $employee->salary;
        $companyMonthlyHours = CompanySetting::where('id', 7)->value('value');
        $payrollPeriod = PayrollPeriod::where('id', $validatedData['payroll_period_id'])->first();
        $payrollPeriod_start_date = $payrollPeriod->start_date; //2021-01-01
        $payrollPeriod_end_date = $payrollPeriod->end_date; //2021 - 12-31

        $number_of_days_worked =  $validatedData['number_of_days_worked'];
        if ($companyMonthlyHours != $number_of_days_worked) {
            $number_of_days_worked =  $validatedData['number_of_days_worked'];
            $basic_salary_arrears =  $validatedData['basic_salary_arrears'];
            $actual_basic_salary =  $validatedData['actual_basic_salary'];
        } else {
            $number_of_days_worked =  $companyMonthlyHours;
            $basic_salary_arrears =  0;
            $actual_basic_salary =  0;
        }

        //Total Overtime Amount In Birr
        $total_ot_amount = OverTimeCalculation::where('employee_id', $employee->id)
            ->where('payroll_period_id',  $payrollPeriod->id)
            ->sum('ot_value');
        $total_taxable_allowance = AllowanceTransaction::where('employee_id', $employee->id)
            ->where('payroll_period_id',  $payrollPeriod->id)
            ->sum('taxable_amount');

        $total_non_taxable_allowance_amount = AllowanceTransaction::where('employee_id', $employee->id)
            ->where('payroll_period_id',  $payrollPeriod->id)
            ->sum('non_taxable_amount');

        $total_allowance = $total_taxable_allowance + $total_non_taxable_allowance_amount;

        $total_taxable_income = AllowanceTransaction::where('employee_id', $employee->id)
            ->where('payroll_period_id',  $payrollPeriod->id)
            ->sum('taxable_amount');

        $total_non_taxable_income_amount = AllowanceTransaction::where('employee_id', $employee->id)
            ->where('payroll_period_id',  $payrollPeriod->id)
            ->sum('non_taxable_amount');

        $total_income = $total_taxable_income + $total_non_taxable_income_amount;
        // dd($total_allowance);

        $total_shift_allowance_amount = 0;
        $total_on_call_allowance_amount = 0;
        $gross_pay =  $employee_salary +  $total_ot_amount +  $total_shift_allowance_amount +  $total_on_call_allowance_amount + $total_allowance;
        dd($gross_pay);


        $loanPayments = LoanPaymentRecord::where('loan_id', $loan->id)->get();
        $totalLoanPayments = $loanPayments->where('loan_id',  $loan->id)->sum('amount_payed');
        $outstanding_amount = $loanAmount -   ($totalLoanPayments  + $validatedData['amount_payed']);
        $validator = Validator::make($validatedData, [
            'amount_payed' => [
                'required',
                function ($attribute, $value, $fail) use ($outstanding_amount) {
                    if ($outstanding_amount < 0) {
                        $fail('The outstanding amount cannot be negative.');
                    }
                },
            ],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $payroll = new Payroll();
        $payroll->employee_id =  $validatedData['employee_id'];
        $payroll->payroll_period_id =  $validatedData['payroll_period_id'];
        $payroll->cost_center_id =  $validatedData['cost_center_id'];
        $payroll->number_of_days_worked =  $validatedData['number_of_days_worked'];
        $payroll->basic_salary_arrears = $basic_salary_arrears;
        $payroll->actual_basic_salary = $actual_basic_salary;
        $payroll->total_ot_amount = $total_ot_amount;
        $payroll->total_shift_allowance_amount = $total_shift_allowance_amount;
        $payroll->total_on_call_allowance_amount = $total_on_call_allowance_amount;
        $payroll->total_taxable_allowance = $total_taxable_allowance;
        $payroll->total_non_taxable_allowance_amount = $total_non_taxable_allowance_amount;
        $payroll->total_allowance = $total_allowance;
        $payroll->gross_pay = $gross_pay;

        $payroll->save();
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
