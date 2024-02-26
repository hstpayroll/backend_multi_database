<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\IncomeTax;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeTaxRequest;
use App\Http\Requests\UpdateIncomeTaxRequest;
use App\Http\Resources\Finance\IncomeTaxResource;


class IncomeTaxController extends Controller
{
    public function index()
    {
        $incomeTaxes = IncomeTax::paginate(10);
        return IncomeTaxResource::collection($incomeTaxes);
    }

    public function store(StoreIncomeTaxRequest $request)
    {
        $incomeTax = IncomeTax::create($request->validated());
        return new IncomeTaxResource($incomeTax);
    }

    public function show(IncomeTax $incomeTax)
    {
        return new IncomeTaxResource($incomeTax);
    }

    public function update(UpdateIncomeTaxRequest $request, IncomeTax $incomeTax)
    {
        $incomeTax->update($request->validated());
        return new IncomeTaxResource($incomeTax);
    }

    public function destroy(IncomeTax $incomeTax)
    {
        $incomeTax->delete();
        return response()->noContent();
    }
}
