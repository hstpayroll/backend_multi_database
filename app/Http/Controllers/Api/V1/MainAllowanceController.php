<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\MainAllowance;
use App\Http\Requests\StoreMainAllowanceRequest;
use App\Http\Requests\UpdateMainAllowanceRequest;
use App\Http\Resources\Finance\MainAllowanceResource;


class MainAllowanceController extends Controller
{
    public function index()
    {
        $mainAllowances = MainAllowance::paginate(10);
        return MainAllowanceResource::collection($mainAllowances);
    }

    public function store(StoreMainAllowanceRequest $request)
    {
        $mainAllowance = MainAllowance::create($request->validated());
        return new MainAllowanceResource($mainAllowance);
    }

    public function show(MainAllowance $mainAllowance)
    {
        return new MainAllowanceResource($mainAllowance);
    }

    public function update(UpdateMainAllowanceRequest $request, MainAllowance $mainAllowance)
    {
        $mainAllowance->update($request->validated());
        return new MainAllowanceResource($mainAllowance);
    }

    public function destroy(MainAllowance $mainAllowance)
    {
        $mainAllowance->delete();
        return response()->noContent();
    }
}
