<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Calendar;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Http\Resources\Finance\CalenderResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalendarController extends Controller
{
    public function index()
    {
        return CalenderResource::collection(Calendar::paginate(10));
    }

    public function store(StoreCalendarRequest $request)
    {
        $calendar = Calendar::create($request->validated());

        return new CalenderResource($calendar);
    }

    public function show(Calendar $calendar)
    {
        return new CalenderResource($calendar);
    }

    public function update(UpdateCalendarRequest $request, Calendar $calendar)
    {
        $calendar->update($request->validated());
        return new CalenderResource($calendar->refresh());
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();

        return response()->noContent();
    }
}
