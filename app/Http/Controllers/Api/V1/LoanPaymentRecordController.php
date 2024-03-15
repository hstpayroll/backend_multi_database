<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\Loan;
use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Tenant\LoanPaymentRecord;
use App\Http\Requests\StoreLoanPaymentRecordRequest;
use App\Http\Requests\UpdateLoanPaymentRecordRequest;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Resources\Finance\LoanPaymentRecordResource;
use Illuminate\Validation\ValidationException;

class LoanPaymentRecordController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_record_index')) {
                $loanPaymentRecords = LoanPaymentRecord::latest()->paginate(10);
                return LoanPaymentRecordResource::collection($loanPaymentRecords);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreLoanPaymentRecordRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_record_store')) {
                $validatedData = $request->validated();
                $loan = Loan::find($validatedData['loan_id'])->first();
                $loanAmount = $loan->amount; // the loan amount that the employee has borrowed
                $employee = Employee::where('id', $loan->employee_id)->first();
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
                // Add a custom validation rule for outstanding amount
                if ($validator->fails()) {
                    throw new ValidationException($validator);
                }

                $loanPaymentRecord = new LoanPaymentRecord();
                $loanPaymentRecord->payroll_period_id =  $validatedData['payroll_period_id'];
                $loanPaymentRecord->loan_id = $validatedData['loan_id'];
                $loanPaymentRecord->amount_payed = $validatedData['amount_payed'];
                $loanPaymentRecord->outstanding_amount =  $outstanding_amount;
                $loanPaymentRecord->is_partial = $validatedData['is_partial'];
                $loanPaymentRecord->is_missed = $validatedData['is_missed'];
                $loanPaymentRecord->save();

                return new LoanPaymentRecordResource($loanPaymentRecord);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, LoanPaymentRecord $loanPaymentRecord)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_record_show')) {
                return new LoanPaymentRecordResource($loanPaymentRecord);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateLoanPaymentRecordRequest $request, LoanPaymentRecord $loanPaymentRecord)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_record_update')) {
                $validatedData = $request->validated();
                $loan = Loan::find($validatedData['loan_id'])->first();
                $loanAmount = $loan->amount; // the loan amount that the employee has borrowed
                $employee = Employee::where('id', $loan->employee_id)->first();
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
                // Add a custom validation rule for outstanding amount
                if ($validator->fails()) {
                    throw new ValidationException($validator);
                }

                $loanPaymentRecord->update([
                    'payroll_period_id'  =>  $validatedData['payroll_period_id'],
                    'loan_id'  => $validatedData['loan_id'],
                    'amount_payed'  => $validatedData['amount_payed'],
                    'outstanding_amount'  =>  $outstanding_amount,
                    'is_partial'  => $validatedData['is_partial'],
                    'is_missed'  => $validatedData['is_missed'],
                ]);


                return new LoanPaymentRecordResource($loanPaymentRecord);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, LoanPaymentRecord $loanPaymentRecord)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_record_destroy')) {
                $loanPaymentRecord->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function showRecordsByEmployee(Request $request, $employee_id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('loan_payment_records_by_employee')) {
                $loans = Loan::where('employee_id', $employee_id)->pluck('id');
                $paymentRecords = LoanPaymentRecord::whereIn('loan_id', $loans)->get();
            return  LoanPaymentRecordResource::collection($paymentRecords);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
        
    }
    public function showLoanPaymentByLoan(Request $request, $loan_id)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payment_recored_by_loan')) {
                $paymentRecords = LoanPaymentRecord::where('loan_id', $loan_id)->get();
                return  LoanPaymentRecord::collection($paymentRecords);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
        
    }
}
