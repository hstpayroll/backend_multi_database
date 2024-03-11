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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allowanceTransaction =  AllowanceTransaction::with(['payrollPeriods', 'employees', 'allowanceTypes'])->paginate(10);
        return AllowanceTransactionResource::collection($allowanceTransaction);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(StoreAllowanceTransactionRequest $request)
    {
        $allowanceTransaction = AllowanceTransaction::create($request->validated());
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(AllowanceTransaction $allowanceTransaction)
    {
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllowanceTransactionRequest $request, AllowanceTransaction $allowanceTransaction)
    {
        $allowanceTransaction->update($request->validated());
        return new AllowanceTransactionResource($allowanceTransaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AllowanceTransaction $allowanceTransaction)
    {
        $allowanceTransaction->delete();
        return response()->noContent();
    }
}
