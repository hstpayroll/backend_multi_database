<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollNameRequest;
use App\Http\Resources\Finance\PayrollNameResource;
use App\Models\PayrollName;

class PayrollNameController extends Controller
{
    public function index()
    {
        $payrollNames = PayrollName::paginate(10);
        return  PayrollNameResource::collection($payrollNames);
    }

    public function store(StorePayrollNameRequest $request)
    {
        $payrollName = PayrollName::create($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Payroll name created successfully',
            'data' => new PayrollNameResource($payrollName),
        ], 201);
    }

    public function show(PayrollName $payrollName)
    {
        return response()->json([
            'status' => 'success',
            'data' => new PayrollNameResource($payrollName),
        ]);
    }

    public function update(StorePayrollNameRequest $request, PayrollName $payrollName)
    {
        $payrollName->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Payroll name updated successfully',
            'data' => new PayrollNameResource($payrollName),
        ]);
    }

    public function destroy(PayrollName $payrollName)
    {
        $payrollName->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Payroll name deleted successfully',
        ]);
    }
}
