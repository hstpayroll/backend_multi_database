<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\OverTimeType;
use App\Http\Resources\Finance\OverTimeTypeResource;
use App\Http\Requests\StoreOverTimeTypeRequest;
use App\Http\Requests\UpdateOverTimeTypeRequest;

class OverTimeTypeController extends Controller
{
    public function index()
    {
        $overTimeTypes = OverTimeType::paginate(10);
        return OverTimeTypeResource::collection($overTimeTypes);
    }

    public function store(StoreOverTimeTypeRequest $request)
    {
        $overTimeType = OverTimeType::create($request->validated());
        return new OverTimeTypeResource($overTimeType);
    }

    public function show(OverTimeType $overTimeType)
    {
        return new OverTimeTypeResource($overTimeType);
    }

    public function update(UpdateOverTimeTypeRequest $request, OverTimeType $overTimeType)
    {
        $overTimeType->update($request->validated());
        return new OverTimeTypeResource($overTimeType);
    }

    public function destroy(OverTimeType $overTimeType)
    {
        $overTimeType->delete();
        return response()->noContent();
    }
}
