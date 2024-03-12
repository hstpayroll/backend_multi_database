<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
use Spatie\QueryBuilder\AllowedSort;
use App\Models\Tenant\AllowanceTransaction;
use App\Http\Requests\StoreAllowanceTransactionRequest;
use App\Http\Requests\UpdateAllowanceTransactionRequest;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
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
        // dd($request->all());
        // $allowanceTransaction = AllowanceTransaction::create($request->validated());
        // return new AllowanceTransactionResource($allowanceTransaction);

        try {
            $user = $request->user();
            if ($user->hasPermissionTo('bank_store')) {
                $validatedData = $request->validated();
                $allowanceType = AllowanceType::find($validatedData['allowance_type_id']);
                // $allowanceTransaction = AllowanceTransaction::where('allowance_type_id', $validatedData['allowance_type_id'])->first();
                // dd($allowanceTransaction);

                $allowanceTransaction = new allowanceTransaction();
                $allowanceTransaction->payroll_period_id =  $validatedData['payroll_period_id'];
                $allowanceTransaction->employee_id = $validatedData['employee_id'];
                $allowanceTransaction->allowance_type_id = $validatedData['allowance_type_id'];
                $allowanceTransaction->amount = $validatedData['amount'];

                $amount = $request['amount'];
                $taxability = $allowanceType->taxability;

                if ($taxability === 1) {
                    $allowanceTransaction->non_taxable_amount = 0;
                    $allowanceTransaction->taxable_amount = $amount;
                } elseif ($taxability === 2) {
                    $allowanceTransaction->non_taxable_amount = $amount;
                    $allowanceTransaction->taxable_amount = 0;
                } elseif ($taxability === 3) {
                    $allowanceTransaction->non_taxable_amount = $allowanceType->tax_free_amount;
                    $allowanceTransaction->taxable_amount = $amount - $allowanceType->tax_free_amount;
                } else {
                    $allowanceTransaction->non_taxable_amount = 0;
                    $allowanceTransaction->taxable_amount = $amount * (1 + 0.35);
                }

                $allowanceTransaction->is_day_based = $validatedData['is_day_based'];

                if ($allowanceTransaction->is_day_based === 1) {
                    $allowanceTransaction->number_of_date = $validatedData['number_of_date'];
                }
                else{
                    $allowanceTransaction->number_of_date = 0;
                }

                $allowanceTransaction->save();
                dd( $allowanceTransaction);

                return new AllowanceTransactionResource($allowanceTransaction);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
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
