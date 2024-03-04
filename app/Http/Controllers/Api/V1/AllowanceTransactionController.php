<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceTransaction;
use App\Http\Resources\Finance\AllowanceTransactionResource;
use Spatie\QueryBuilder\AllowedSort;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AllowanceTransaction $allowanceTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
