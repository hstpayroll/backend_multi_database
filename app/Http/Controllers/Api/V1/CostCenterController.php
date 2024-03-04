<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Response;
use App\Models\Tenant\CostCenter;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreCostCenterRequest;
use App\Http\Requests\UpdateCostCenterRequest;
use App\Http\Resources\Finance\CostCenterResource;


class CostCenterController extends Controller
{
    public function index()
    {
        $costCenters = CostCenter::paginate(10);
        return CostCenterResource::collection($costCenters);
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
