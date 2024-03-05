<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\PayslipSetting;
use App\Http\Resources\Finance\PayslipSettingResource;
use App\Http\Requests\StorePayslipSettingRequest;
use App\Http\Requests\UpdatePayslipSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PayslipSettingController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payslip_setting_index')) {
                $payslipSettings = PayslipSetting::paginate(10);
                return PayslipSettingResource::collection($payslipSettings);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StorePayslipSettingRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payslip_setting_store')) {
                $payslipSetting = PayslipSetting::create($request->validated());
                return new PayslipSettingResource($payslipSetting);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, PayslipSetting $payslipSetting)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payslip_setting_show')) {
                return new PayslipSettingResource($payslipSetting);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdatePayslipSettingRequest $request, PayslipSetting $payslipSetting)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payslip_setting_update')) {
                $payslipSetting->update($request->validated());
                return new PayslipSettingResource($payslipSetting);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, PayslipSetting $payslipSetting)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('payslip_setting_destroy')) {
                $payslipSetting->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
