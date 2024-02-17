<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Resources\Finance\CurrencyResource;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::paginate(10); // You can adjust the number of items per page as needed
        return CurrencyResource::collection($currencies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCurrencyRequest $request)
    {
        $currency =   Currency::create($request->validated());
        return new CurrencyResource($currency);
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return new CurrencyResource($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCurrencyRequest $request, Currency $currency)
    {
        $currency->update($request->validated());
        return new CurrencyResource($currency->refresh());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return response()->noContent();
    }
}
