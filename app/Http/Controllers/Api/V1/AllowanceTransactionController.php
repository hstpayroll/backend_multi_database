<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Employee;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
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
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('allowance_transaction_index')) {
                $allowanceTransaction =  AllowanceTransaction::with(['payrollPeriod', 'employee', 'allowanceType'])->paginate(10);
                return AllowanceTransactionResource::collection($allowanceTransaction);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    public function store(StoreAllowanceTransactionRequest $request)
    {

        try {
            $user = $request->user();
            if ($user->hasPermissionTo('allowance_transaction_store')) {
                $validatedData = $request->validated();
                $allowanceType = AllowanceType::find($validatedData['allowance_type_id']);

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
                }
                // taxability when the value type is percentage?
                elseif ($taxability === 3) {
                    $allowanceTransaction->non_taxable_amount = $allowanceType->tax_free_amount;
                    $allowanceTransaction->taxable_amount = $amount - $allowanceType->tax_free_amount;
                }
                //taxability by taking the total amount of the employee?
                else {
                    $allowanceTransaction->non_taxable_amount = 0;
                    $allowanceTransaction->taxable_amount = $amount * (1 + 0.35);
                }

                $allowanceTransaction->is_day_based = $validatedData['is_day_based'];

                if ($allowanceTransaction->is_day_based === 1) {
                    $allowanceTransaction->number_of_date = $validatedData['number_of_date'];
                } else {
                    $allowanceTransaction->number_of_date = 0;
                }

                $allowanceTransaction->save();
                dd($allowanceTransaction);

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
    public function show(Request $request, AllowanceTransaction $allowanceTransaction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('allowance_transaction_show')) {
                return new AllowanceTransactionResource($allowanceTransaction);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAllowanceTransactionRequest $request, AllowanceTransaction $allowanceTransaction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('allowance_transaction_update')) {
                $allowanceTransaction->update($request->validated());
                return new AllowanceTransactionResource($allowanceTransaction);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, AllowanceTransaction $allowanceTransaction)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('allowance_transaction_destroy')) {
                $allowanceTransaction->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Employee Transaction deleted successfully',
                ]);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }


    public function allowanceTransactionByEmployee(Request $request, Employee $employee)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('transaction_by_employee_show')) {
                $employee_id = $request->employee_id;
                $allowanceTransaction = AllowanceTransaction::where('employee_id', $employee_id)->get();
                return  AllowanceTransactionResource::collection($allowanceTransaction);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
