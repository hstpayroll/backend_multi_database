<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeductionRequest;
use App\Http\Requests\UpdateDeductionRequest;
use App\Http\Resources\Finance\DeductionResource;
use App\Models\Tenant\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function index()
    {
        $deductions = Deduction::all();
        return DeductionResource::collection($deductions);
    }

    public function store(StoreDeductionRequest $request)
    {
        $validatedData = $request->validated();
        $deduction = Deduction::create($validatedData);
        return new DeductionResource($deduction);
    }

    public function show(Deduction $deduction)
    {
        return new DeductionResource($deduction);
    }

    public function update(UpdateDeductionRequest $request, Deduction $deduction)
    {
        $deduction->update($request->validated());
        return new DeductionResource($deduction);
    }

    public function destroy(Deduction $deduction)
    {
        $deduction->delete();
        return response()->noContent();
    }
}
