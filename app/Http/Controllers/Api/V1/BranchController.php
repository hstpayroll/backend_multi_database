<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Branch;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BranchController extends Controller
{
    public function __construct()
    {
    }

    public function index(): AnonymousResourceCollection
    {
        $branches = Branch::paginate();

        return BranchResource::collection($branches);
    }

    public function store(Request $request): JsonResponse
    {
        $branch = Branch::create($request->validated());

        return $this->responseCreated('Branch created successfully',
         new BranchResource($branch));
    }

    public function show(Branch $branch): JsonResponse
    {
        return $this->responseSuccess(null, new BranchResource($branch));
    }

    public function update(Request $request, Branch $branch): JsonResponse
    {
        $branch->update($request->validated());

        return $this->responseSuccess('Branch updated Successfully', new BranchResource($branch));
    }

    public function destroy(Branch $branch): JsonResponse
    {
        $branch->delete();

        return $this->responseDeleted();
    }
}
