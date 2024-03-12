<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\AllowedSort;
use App\Models\Tenant\AllowanceTransaction;
use App\Http\Requests\StoreAllowanceTransactionRequest;
use App\Http\Requests\UpdateAllowanceTransactionRequest;
use App\Http\Resources\Finance\AllowanceTransactionResource;

class AllowanceTransactionController extends Controller
{
    public function index()
    {
        $allowanceTransaction =  AllowanceTransaction::with(['payrollPeriod', 'employee', 'allowanceType'])->paginate(10);
        return AllowanceTransactionResource::collection($allowanceTransaction);
    }

    public function store(StoreAllowanceTransactionRequest $request)
    {
        $allowanceTransaction = AllowanceTransaction::create($request->validated());
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    public function show(AllowanceTransaction $allowanceTransaction)
    {
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    public function update(UpdateAllowanceTransactionRequest $request, AllowanceTransaction $allowanceTransaction)
    {
        $allowanceTransaction->update($request->validated());
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    public function destroy(AllowanceTransaction $allowanceTransaction)
    {
        $allowanceTransaction->delete();
        return response()->noContent();
    }
}
