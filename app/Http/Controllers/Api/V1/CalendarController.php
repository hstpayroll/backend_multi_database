<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Http\Resources\Finance\CalenderResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalendarController extends Controller
{
    public function index()
    {
        $calendars = Calendar::paginate(10);

        return CalenderResource::collection($calendars);
    }

    public function store(Request $request): JsonResponse
    {
        $calendar = Calendar::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Employment type created successfully',
            'data' => new CalenderResource($calendar),
        ], 201);
    }

    public function show(Calendar $calendar): JsonResponse
    {
        return response()->json([
            'status' => 'success',
            'data' => new CalenderResource($calendar),
        ]);
    }

    public function update(Request $request, Calendar $calendar)
    {
        $calendar->update($request->validated());
        return new CalenderResource($calendar->refresh());
    }

    public function destroy(Calendar $calendar): JsonResponse
    {
        $calendar->delete();

        return $this->responseDeleted();
    }
}
