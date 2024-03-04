<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use App\Models\Tenant\CostCenter;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreCostCenterRequest;
use App\Http\Requests\UpdateCostCenterRequest;
use App\Http\Resources\Finance\CostCenterResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CostCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost-center_index')) {
                $costCenters = CostCenter::paginate(10);
                return CostCenterResource::collection($costCenters);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreCostCenterRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost-center_store')) {
                $costCenter = CostCenter::create($request->validated());
                return new CostCenterResource($costCenter);
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
    public function show(Request $request, CostCenter $costCenter)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('cost-center_show')) {
                return new CostCenterResource($costCenter);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostCenterRequest $request, CostCenter $costCenter)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost-center_update')) {
                // Update the cost center data using the request data
                $costCenter->update($request->all());
                return new CostCenterResource($costCenter);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CostCenter $costCenter)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('cost-center_destroy')) {
                $costCenter->delete();
                return response()->json(['message' => 'Cost center deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
