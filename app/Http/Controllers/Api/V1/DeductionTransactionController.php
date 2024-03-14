<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionTransactionRequest;
use App\Http\Requests\UpdateDeductionTransactionRequest;
use App\Http\Resources\Finance\DeductionTransactionResource;
use App\Models\Tenant\DeductionTransaction;
use Symfony\Component\HttpFoundation\Response;

class DeductionTransactionController extends Controller
{
    public function index()
    {
        $deductionTransactions = DeductionTransaction::paginate(10);
        return DeductionTransactionResource::collection($deductionTransactions);
    }

    public function store(StoreDeductionTransactionRequest $request)
    {
        $validatedData = $request->validated();
        $deductionTransaction = DeductionTransaction::create($validatedData);
        return new DeductionTransactionResource($deductionTransaction);
    }

    public function show($id)
    {
        $deductionTransaction = DeductionTransaction::findOrFail($id);
        return new DeductionTransactionResource($deductionTransaction);
    }

    public function update(UpdateDeductionTransactionRequest $request, $id)
    {
        $deductionTransaction = DeductionTransaction::findOrFail($id);
        $validatedData = $request->validated();
        $deductionTransaction->update($validatedData);
        return new DeductionTransactionResource($deductionTransaction);
    }

    public function destroy($id)
    {
        $deductionTransaction = DeductionTransaction::findOrFail($id);
        $deductionTransaction->delete();
        return response()->noContent();
    }
}
