<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\Finance\PositionResource;
use App\Models\AppModelsTenantPosition;
use App\Models\Tenant\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return PositionResource::collection(Position::paginate(20));
    }

    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->validated());
        return new PositionResource($position);
    }

    public function show(Position $position)
    {
        return new PositionResource($position);
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->validated());
        return new PositionResource($position);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return response()->noContent();
    }
}
