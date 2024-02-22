<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxRegionRequest;
use App\Http\Requests\UpdateTaxRegionRequest;
use App\Http\Resources\Finance\TaxRegionResource;
use App\Models\Tenant\TaxRegion;

class TaxRegionController extends Controller
{
    public function index()
    {
        $taxRegions = TaxRegion::all();
        return response()->json(['data' => TaxRegionResource::collection($taxRegions)], 200);
    }

    public function store(StoreTaxRegionRequest $request)
    {
        $validatedData = $request->validated();
        $taxRegion = TaxRegion::create($validatedData);
        return response()->json(['data' => new TaxRegionResource($taxRegion)], 201);
    }

    public function show(TaxRegion $taxRegion)
    {
        return response()->json(['data' => new TaxRegionResource($taxRegion)], 200);
    }

    public function update(UpdateTaxRegionRequest $request, TaxRegion $taxRegion)
    {
        $validatedData = $request->validated();
        $taxRegion->update($validatedData);
        return response()->json(['data' => new TaxRegionResource($taxRegion)], 200);
    }

    public function destroy(TaxRegion $taxRegion)
    {
        $taxRegion->delete();
        return response()->json(['message' => 'TaxRegion deleted successfully'], 200);
    }
}
