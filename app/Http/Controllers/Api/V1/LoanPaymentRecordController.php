<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\Loan;
use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Models\Tenant\LoanPaymentRecord;
use App\Http\Requests\StoreLoanPaymentRecordRequest;
use App\Http\Requests\UpdateLoanPaymentRecordRequest;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Resources\Finance\LoanPaymentRecordResource;

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
                if ($outstanding_amount < 0) {
                    $outstanding_amount = 0;
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
                $loanPaymentRecord->update($request->validated());
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
}
