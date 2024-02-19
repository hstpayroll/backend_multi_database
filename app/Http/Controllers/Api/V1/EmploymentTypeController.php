<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tenant\EmploymentType;
use App\Http\Requests\StoreEmploymentTypeRequest;
use App\Http\Resources\Finance\EmploymentTypeResource;

class EmploymentTypeController extends Controller
{
    /**
     * Display a paginated list of employment types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employmentTypes = EmploymentType::paginate(10);
        return  EmploymentTypeResource::collection($employmentTypes);
    }

    /**
     * Store a newly created employment type in storage.
     *
     * @param  \App\Http\Requests\StoreEmploymentTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmploymentTypeRequest $request)
    {
        $employmentType = EmploymentType::create($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Employment type created successfully',
            'data' => new EmploymentTypeResource($employmentType),
        ], 201);
    }

    /**
     * Display the specified employment type.
     *
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentType $employmentType)
    {
        return response()->json([
            'status' => 'success',
            'data' => new EmploymentTypeResource($employmentType),
        ]);
    }

    /**
     * Update the specified employment type in storage.
     *
     * @param  \App\Http\Requests\StoreEmploymentTypeRequest  $request
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmploymentTypeRequest $request, EmploymentType $employmentType)
    {
        $employmentType->update($request->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Employment type updated successfully',
            'data' => new EmploymentTypeResource($employmentType),
        ]);
    }

    /**
     * Remove the specified employment type from storage.
     *
     * @param  \App\Models\EmploymentType  $employmentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentType $employmentType)
    {
        $employmentType->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Employment type deleted successfully',
        ]);
    }
}
