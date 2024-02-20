<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCostCenterRequest;
use App\Http\Requests\StoreCostCenterRequest;

use App\Http\Resources\Finance\CostCenterResource;
use App\Models\Tenant\CostCenter;
use Illuminate\Http\Response;

class CostCenterController extends Controller
{
    public function index()
    {
        $costCenters = CostCenter::paginate(10);
        return response()->json(['data' => CostCenterResource::collection($costCenters)], Response::HTTP_OK);
    }

    public function store(StoreCostCenterRequest $request)
    {
        $costCenter = CostCenter::create($request->validated());
        return response()->json(['data' => new CostCenterResource($costCenter)], Response::HTTP_CREATED);
    }

    public function show(CostCenter $costCenter)
    {
        return response()->json(['data' => new CostCenterResource($costCenter)], Response::HTTP_OK);
    }

    public function update(UpdateCostCenterRequest $request, CostCenter $costCenter)
    {
        $costCenter->update($request->validated());
        return response()->json(['data' => new CostCenterResource($costCenter)], Response::HTTP_OK);
    }

    public function destroy(CostCenter $costCenter)
    {
        $costCenter->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
