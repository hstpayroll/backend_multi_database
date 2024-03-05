<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Tenant\MainAllowance;
use App\Http\Resources\Finance\MainAllowanceResource;
use App\Http\Requests\StoreMainAllowanceRequest;
use App\Http\Requests\UpdateMainAllowanceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class MainAllowanceController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_allowance_index')) {
                return MainAllowanceResource::collection(MainAllowance::paginate(10));
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreMainAllowanceRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_allowance_store')) {
                $validatedData = $request->validated();
                $mainAllowance = MainAllowance::create($validatedData);
                return new MainAllowanceResource($mainAllowance);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, MainAllowance $mainAllowance)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_allowance_show')) {
                return new MainAllowanceResource($mainAllowance);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateMainAllowanceRequest $request, MainAllowance $mainAllowance)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_allowance_update')) {
                $validatedData = $request->validated();
                $mainAllowance->update($validatedData);
                return new MainAllowanceResource($mainAllowance);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, MainAllowance $mainAllowance)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('main_allowance_destroy')) {
                $mainAllowance->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
