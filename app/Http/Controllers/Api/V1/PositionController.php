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
        $positions = Position::paginate(20);
        return response()->json([
            'data' => PositionResource::collection($positions),
            'message' => 'Positions retrieved successfully.',
        ], 200);
    }

    public function store(StorePositionRequest $request)
    {
        $position = Position::create($request->validated());
        return response()->json([
            'data' => new PositionResource($position),
            'message' => 'Position created successfully.',
        ], 201);
    }

    public function show(Position $position)
    {
        return response()->json([
            'data' => new PositionResource($position),
            'message' => 'Position retrieved successfully.',
        ], 200);
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        $position->update($request->validated());
        return response()->json([
            'data' => new PositionResource($position),
            'message' => 'Position updated successfully.',
        ], 200);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return response()->json([
            'message' => 'Position deleted successfully.',
        ], 204);
    }
}
