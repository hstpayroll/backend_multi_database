<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tenant\PayrollName;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollNameRequest;
use App\Http\Resources\Finance\PayrollNameResource;

class PayrollNameController extends Controller
{
    public function index()
    {
        $payrollNames = PayrollName::paginate(10);
        return PayrollNameResource::collection($payrollNames);
    }

    public function store(StorePayrollNameRequest $request)
    {
        $payrollName = PayrollName::create($request->validated());
        return new PayrollNameResource($payrollName);
    }

    public function show(PayrollName $payrollName)
    {
        return new PayrollNameResource($payrollName);
    }

    public function update(StorePayrollNameRequest $request, PayrollName $payrollName)
    {
        $payrollName->update($request->validated());
        return new PayrollNameResource($payrollName);
    }

    public function destroy(PayrollName $payrollName)
    {
        $payrollName->delete();
        return response()->noContent();
    }
}
