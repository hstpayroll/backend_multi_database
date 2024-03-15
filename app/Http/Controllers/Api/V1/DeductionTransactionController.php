<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionTransactionRequest;
use App\Http\Requests\UpdateDeductionTransactionRequest;
use App\Http\Resources\Finance\DeductionTransactionResource;
use App\Models\Tenant\Deduction;
use App\Models\Tenant\DeductionTransaction;
use App\Models\Tenant\Employee;
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

        // Get the employee's ID from the validated data
        $employeeId = $validatedData['employee_id'];
        // Get the deduction value
        $deduction = Deduction::findOrFail($validatedData['deduction_id']);
        $value = $deduction->value; //15000
        // Get the current outstanding amount for the employee
        $totalPaymenet = DeductionTransaction::where('employee_id', $employeeId)
            ->where('deduction_id', $validatedData['deduction_id'])
            ->sum('amount_deducted');

        $employee = Employee::findOrFail($employeeId);
        $employeeSalary = $employee->salary; //for salary % only


        $outstandingAmount = $value - $validatedData['amount_deducted'] -  $totalPaymenet;

        $deductionTransaction = new DeductionTransaction();

        $deductionTransaction->payroll_period_id = $validatedData['payroll_period_id'];
        $deductionTransaction->employee_id = $validatedData['employee_id'];
        $deductionTransaction->deduction_id = $validatedData['deduction_id'];
        $deductionTransaction->amount_deducted = $validatedData['amount_deducted'];
        $deductionTransaction->outstanding_amount =  $outstandingAmount;
        $deductionTransaction->save();


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
