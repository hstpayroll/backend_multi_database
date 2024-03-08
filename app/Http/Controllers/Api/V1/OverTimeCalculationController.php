<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\OverTimeCalculation;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\Http\Resources\Finance\OverTimeCalculationResource;

class OverTimeCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('overtime_type_index')) {
                $overTimeDeductions = OverTimeCalculation::latest()->paginate(10);
                return OverTimeCalculationResource::collection($overTimeDeductions);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OverTimeCalculation $overTimeCalculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OverTimeCalculation $overTimeCalculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OverTimeCalculation $overTimeCalculation)
    {
        //
    }
}
