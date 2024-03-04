<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayrollPeriodRequest;
use App\Http\Requests\UpdatePayrollPeriodRequest;
use App\Http\Resources\Finance\PayrollPeriodResource;
use App\Models\Tenant\PayrollPeriod;

class PayrollPeriodController extends Controller
{
    public function index()
    {
        $payrollPeriods = PayrollPeriod::first();
        return PayrollPeriodResource::collection($payrollPeriods);
    }

    public function store(StorePayrollPeriodRequest $request)
    {
        $validatedData = $request->validated();
        $payrollPeriod = PayrollPeriod::create($validatedData);
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function show(PayrollPeriod $payrollPeriod)
    {
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function update(UpdatePayrollPeriodRequest $request, PayrollPeriod $payrollPeriod)
    {
        $validatedData = $request->validated();
        $payrollPeriod->update($validatedData);
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function destroy(PayrollPeriod $payrollPeriod)
    {
        $payrollPeriod->delete();
        return response()->noContent();
    }
}
