<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
use App\Http\Requests\StoreAllowanceTypeRequest;
use App\Http\Requests\UpdateAllowanceTypeRequest;
use App\Http\Resources\Finance\AllowanceTypeResource;

class AllowanceTypeController extends Controller
{
    public function index()
    {
        $allowanceTypes = AllowanceType::latest()->paginate(10);
        return AllowanceTypeResource::collection($allowanceTypes);
    }

    public function store(StoreAllowanceTypeRequest $request)
    {

        $allowanceType = AllowanceType::create($request->validated());
        if ($request->has('applies_to')) {
            $allowanceType->employees()->attach($request->input('applies_to'));
        }
        return new AllowanceTypeResource($allowanceType);
    }

    public function show(AllowanceType $allowanceType)
    {
        return new AllowanceTypeResource($allowanceType);
    }

    public function update(UpdateAllowanceTypeRequest $request, AllowanceType $allowanceType)
    {
        $allowanceType->update($request->validated());
        return new AllowanceTypeResource($allowanceType);
    }

    public function destroy(AllowanceType $allowanceType)
    {
        $allowanceType->delete();
        return response()->noContent();
    }
}
