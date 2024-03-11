<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\LoanPaymentRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanPaymentRecordRequest;
use App\Http\Requests\UpdateLoanPaymentRecordRequest;
use App\Http\Resources\Finance\LoanPaymentRecordResource;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

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
                $validated = $request->validated();
                $loanPaymentRecord = LoanPaymentRecord::create($request->validated());
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
