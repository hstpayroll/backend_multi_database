<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\Finance\LoanResource;
use App\Models\Tenant\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::paginate(10);
        return LoanResource::collection($loans);
    }

    public function store(StoreLoanRequest $request)
    {
        $loan = Loan::create($request->validated());
        return new LoanResource($loan);
    }

    public function show(Loan $loan)
    {
        return new LoanResource($loan);
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        $loan->update($request->validated());
        return new LoanResource($loan);
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();
        return response()->noContent();
    }
}
