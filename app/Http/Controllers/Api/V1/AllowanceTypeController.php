<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
use Illuminate\Support\Facades\Validator;
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

    public function store(StoreAllowanceTypeRequest $request, AllowanceType $allowanceType)
    {
        $allowanceType = AllowanceType::create($request->validated());
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
