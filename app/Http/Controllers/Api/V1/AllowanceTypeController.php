<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Tenant\AllowanceType;
use App\Http\Requests\StoreAllowanceTypeRequest;
use App\Http\Requests\UpdateAllowanceTypeRequest;
use App\Http\Resources\Finance\AllowanceTypeResource;

class AllowanceTypeController extends Controller
{
    public function index()
    {
        $allowanceTypes = AllowanceType::paginate(10);
        return AllowanceTypeResource::collection($allowanceTypes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'main_allowance_id' => 'required|exists:main_allowances,id',
            'name' => 'required|string',
            'taxability' => 'required|integer|between:1,4',
            'tax_free_amount' => [
                'nullable',
                'numeric',
                Rule::requiredIf(function () use ($request) {
                    return $request->input('taxability') == 3;
                }),
            ],
            'value_type' => 'required|boolean',
            'value' => [
                'required_if:value_type,1',
                'numeric',
            ],
            'status' => 'nullable|integer',
        ]);

        $allowanceType = AllowanceType::create($data);
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
