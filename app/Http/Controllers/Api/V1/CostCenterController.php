<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tenant\CostCenter;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCostCenterRequest;
use App\Http\Requests\UpdateCostCenterRequest;
use App\Http\Resources\Finance\CostCenterResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;


class CostCenterController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost_center_index')) {
                $costCenters = CostCenter::paginate(10);
                return  CostCenterResource::collection($costCenters);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreCostCenterRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost_center_store')) {
                $costCenter = CostCenter::create($request->validated());
                return new CostCenterResource($costCenter);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, CostCenter $costCenter)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('cost_center_show')) {
                return new CostCenterResource($costCenter);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateCostCenterRequest $request, CostCenter $costCenter)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost_center_update')) {
                // Update the calendar data using the request data
                $costCenter->update($request->all());
                return new CostCenterResource($costCenter);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, CostCenter $costCenter)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost_center_destroy')) {
                $costCenter->delete();
                return response()->json(['message' => 'company Pension deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
