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

    public function show($id)
    {
        $deduction = Deduction::findOrFail($id);
        return new DeductionResource($deduction);
    }

    public function update(UpdateDeductionRequest $request, $id)
    {
        $validatedData = $request->validated();
        $deduction = Deduction::findOrFail($id);
        $deduction->update($validatedData);
        return new DeductionResource($deduction);
    }

    public function destroy($id)
    {
        $deduction = Deduction::findOrFail($id);
        $deduction->delete();
        return response()->noContent();
    }
}
