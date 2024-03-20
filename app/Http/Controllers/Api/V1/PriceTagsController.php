<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\PriceTags;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceTagsRequest;
use App\Http\Requests\UpdatePriceTagsRequest;
use App\Http\Resources\Finance\PriceTagResource;

class PriceTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricetags = PriceTags::latest()->paginate(10);
        return PriceTagResource::collection($pricetags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriceTagsRequest $request)
    {
        $validatedData = $request->validated();
        $pricetag = PriceTags::create($validatedData);
        return new PriceTagResource($pricetag);
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceTags $priceTags)
    {
        return new PriceTagResource($priceTags);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriceTagsRequest $request, PriceTags $priceTags)
    {
        $priceTags->update($request->validated());
        return new PriceTagResource($priceTags);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceTags $priceTags)
    {
        $priceTags->delete();
        return response()->noContent();
    }
}
