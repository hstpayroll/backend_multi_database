<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Http\Resources\Finance\PositionResource;
use App\Models\Tenant\Position;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('position_index')) {
                return PositionResource::collection(Position::latest()->paginate(20));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StorePositionRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('position_store')) {
                $position = Position::create($request->validated());
                return new PositionResource($position);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Position $position)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('position_show')) {
                return new PositionResource($position);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdatePositionRequest $request, Position $position)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('position_update')) {
                $position->update($request->validated());
                return new PositionResource($position);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Position $position)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('position_destroy')) {
                $position->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}

