<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanTypeRequest;
use App\Http\Requests\UpdateLoanTypeRequest;
use App\Http\Resources\Finance\LoanTypeResource;
use App\Models\Tenant\LoanType;
use Illuminate\Http\Request;

class LoanTypeController extends Controller
{
    public function index()
    {
        $loanTypes = LoanType::paginate(10);
        return LoanTypeResource::collection($loanTypes);
    }

    public function store(StoreLoanTypeRequest $request)
    {
        $loanType = LoanType::create($request->validated());
        return new LoanTypeResource($loanType);
    }

    public function show(LoanType $loanType)
    {
        return new LoanTypeResource($loanType);
    }

    public function update(UpdateLoanTypeRequest $request, LoanType $loanType)
    {
        $loanType->update($request->validated());
        return new LoanTypeResource($loanType);
    }

    public function destroy(LoanType $loanType)
    {
        $loanType->delete();
        return response()->noContent();
    }
}
