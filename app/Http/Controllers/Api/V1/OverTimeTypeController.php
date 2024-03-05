<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\OverTimeType;
use App\Http\Resources\Finance\OverTimeTypeResource;
use App\Http\Requests\StoreOverTimeTypeRequest;
use App\Http\Requests\UpdateOverTimeTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class OverTimeTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_index')) {
                $overTimeTypes = OverTimeType::paginate(10);
                return OverTimeTypeResource::collection($overTimeTypes);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreOverTimeTypeRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_store')) {
                $overTimeType = OverTimeType::create($request->validated());
                return new OverTimeTypeResource($overTimeType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, OverTimeType $overTimeType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_show')) {
                return new OverTimeTypeResource($overTimeType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateOverTimeTypeRequest $request, OverTimeType $overTimeType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_update')) {
                $overTimeType->update($request->validated());
                return new OverTimeTypeResource($overTimeType);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, OverTimeType $overTimeType)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_destroy')) {
                $overTimeType->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
