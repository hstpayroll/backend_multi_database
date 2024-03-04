<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\PayslipSetting;
use App\Http\Resources\Finance\PayslipSettingResource;
use App\Http\Requests\StorePayslipSettingRequest;
use App\Http\Requests\UpdatePayslipSettingRequest;

class PayslipSettingController extends Controller
{
    public function index()
    {
        $payslipSettings = PayslipSetting::paginate(10);
        return PayslipSettingResource::collection($payslipSettings);
    }

    public function store(StorePayslipSettingRequest $request)
    {
        $payslipSetting = PayslipSetting::create($request->validated());
        return new PayslipSettingResource($payslipSetting);
    }

    public function show(PayslipSetting $payslipSetting)
    {
        return new PayslipSettingResource($payslipSetting);
    }

    public function update(UpdatePayslipSettingRequest $request, PayslipSetting $payslipSetting)
    {
        $payslipSetting->update($request->validated());
        return new PayslipSettingResource($payslipSetting);
    }

    public function destroy(PayslipSetting $payslipSetting)
    {
        $payslipSetting->delete();
        return response()->noContent();
    }
}
