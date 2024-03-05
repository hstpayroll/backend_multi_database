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
        $payrollPeriods = PayrollPeriod::with(['payrollName', 'payrollType', 'fiscalYear', 'employeePension', 'companyPension'])->paginate();
        return PayrollPeriodResource::collection($payrollPeriods);
    }

    public function store(StorePayrollPeriodRequest $request)
    {
        $payrollPeriod = PayrollPeriod::create($request->validated());
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function show(PayrollPeriod $payrollPeriod)
    {
        $payrollPeriod->load(['payrollName', 'payrollType', 'fiscalYear', 'employeePension', 'companyPension']);
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function update(UpdatePayrollPeriodRequest $request, PayrollPeriod $payrollPeriod)
    {
        $payrollPeriod->update($request->validated());
        return new PayrollPeriodResource($payrollPeriod);
    }

    public function destroy(PayrollPeriod $payrollPeriod)
    {
        $payrollPeriod->delete();
        return response()->noContent();
    }
}
