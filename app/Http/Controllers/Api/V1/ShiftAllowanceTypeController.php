<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShiftAllowanceTypeRequest;
use App\Http\Requests\UpdateShiftAllowanceTypeRequest;
use App\Http\Resources\Finance\ShiftAllowanceTypeResource;
use App\Models\Tenant\ShiftAllowanceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class ShiftAllowanceTypeController extends Controller
{
    public function index()
    {
        $shiftAllowanceTypes = ShiftAllowanceType::paginate(10);
        return ShiftAllowanceTypeResource::collection($shiftAllowanceTypes);
    }

    public function store(StoreShiftAllowanceTypeRequest $request)
    {
        $validatedData = $request->validated();
        $shiftAllowanceType = ShiftAllowanceType::create($validatedData);
        return new ShiftAllowanceTypeResource($shiftAllowanceType);
    }

    public function show(ShiftAllowanceType $shiftAllowanceType)
    {
        return new ShiftAllowanceTypeResource($shiftAllowanceType);
    }

    public function update(UpdateShiftAllowanceTypeRequest $request, ShiftAllowanceType $shiftAllowanceType)
    {
        $validatedData = $request->validated();
        $shiftAllowanceType->update($validatedData);
        return new ShiftAllowanceTypeResource($shiftAllowanceType);
    }

    public function destroy(ShiftAllowanceType $shiftAllowanceType)
    {
        $shiftAllowanceType->delete();
        return Response::noContent();
    }
}
