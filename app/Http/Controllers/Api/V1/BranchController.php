<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Http\Resources\Finance\BranchResource;
use App\Models\Tenant\Branch;
use Illuminate\Http\JsonResponse;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('branch_index')) {
                $branches = Branch::latest()->paginate();
                return BranchResource::collection($branches);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreBranchRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('branch_store')) {
                $branch = Branch::create($request->validated());
                return new BranchResource($branch);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function show(Request $request, Branch $branch)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('branch_show')) {
                return new BranchResource($branch);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(UpdateBranchRequest $request, Branch $branch)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('branch_update')) {
                $branch->update($request->validated());
                return new BranchResource($branch);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Branch $branch)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('branch_destroy')) {
                $branch->delete();
                return response()->json(['message' => 'Branch deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }
}
