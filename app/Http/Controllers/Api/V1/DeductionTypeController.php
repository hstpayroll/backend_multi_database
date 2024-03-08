<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionTypeRequest;
use App\Http\Requests\UpdateDeductionTypeRequest;
use App\Http\Resources\Finance\DeductionTypeResource;
use App\Models\Tenant\DeductionType;
use Illuminate\Http\Request;

class DeductionTypeController extends Controller
{
    public function index()
    {
        $deductionTypes = DeductionType::all();
        return DeductionTypeResource::collection($deductionTypes);
    }

    public function store(StoreDeductionTypeRequest $request)
    {
        $validatedData = $request->validated();
        $deductionType = DeductionType::create($validatedData);
        return new DeductionTypeResource($deductionType);
    }

    public function show(DeductionType $deductionType)
    {
        return new DeductionTypeResource($deductionType);
    }

    public function update(UpdateDeductionTypeRequest $request, DeductionType $deductionType)
    {
        $validatedData = $request->validated();
        $deductionType->update($validatedData);
        return new DeductionTypeResource($deductionType);
    }

    public function destroy(DeductionType $deductionType)
    {
        $deductionType->delete();
        return response()->noContent();
    }
}
