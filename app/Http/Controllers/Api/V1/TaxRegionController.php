<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\TaxRegion;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaxRegionRequest;
use App\Http\Requests\UpdateTaxRegionRequest;
use App\Http\Resources\Finance\TaxRegionResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class TaxRegionController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('tax_region_index')) {
                return TaxRegionResource::collection(TaxRegion::all());
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreTaxRegionRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('tax_region_store')) {
                $taxRegion = TaxRegion::create($request->validated());
                return new TaxRegionResource($taxRegion);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, TaxRegion $taxRegion)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('tax_region_show')) {
                return new TaxRegionResource($taxRegion);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(UpdateTaxRegionRequest $request, TaxRegion $taxRegion)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('tax_region_update')) {
                $validatedData = $request->validated();
                $taxRegion->update($validatedData);
                return new TaxRegionResource($taxRegion);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, TaxRegion $taxRegion)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('tax_region_destroy')) {
                $taxRegion->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
