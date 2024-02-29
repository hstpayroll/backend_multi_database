<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\LoanPaymentRecord;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanPaymentRecordRequest;
use App\Http\Requests\UpdateLoanPaymentRecordRequest;
use App\Http\Resources\Finance\LoanPaymentRecordResource;
use Illuminate\Http\Request;

class LoanPaymentRecordController extends Controller
{
    public function index()
    {
        $loanPaymentRecords = LoanPaymentRecord::paginate(10);
        return LoanPaymentRecordResource::collection($loanPaymentRecords);
    }

    public function store(StoreLoanPaymentRecordRequest $request)
    {
        $loanPaymentRecord = LoanPaymentRecord::create($request->validated());
        return new LoanPaymentRecordResource($loanPaymentRecord);
    }

    public function show(LoanPaymentRecord $loanPaymentRecord)
    {
        return new LoanPaymentRecordResource($loanPaymentRecord);
    }

    public function update(UpdateLoanPaymentRecordRequest $request, LoanPaymentRecord $loanPaymentRecord)
    {
        $loanPaymentRecord->update($request->validated());
        return new LoanPaymentRecordResource($loanPaymentRecord);
    }

    public function destroy(LoanPaymentRecord $loanPaymentRecord)
    {
        $loanPaymentRecord->delete();
        return response()->noContent();
    }
}
