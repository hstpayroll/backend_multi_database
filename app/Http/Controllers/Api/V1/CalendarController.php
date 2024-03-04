<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Calendar;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Http\Resources\Finance\CalenderResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalendarController extends Controller
{

    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('calendar_index')) {
                $calendars = Calendar::paginate(10);
                return  CalenderResource::collection($calendars);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function store(StoreCalendarRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('calendar_store')) {
                $calendar = Calendar::create($request->validated());
                return new CalenderResource($calendar);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
        
    public function show(Request $request, Calendar $calendar)
    {
        $user = $request->user();
        try {
            if ($user->hasPermissionTo('calendar_show')) {
                return new CalenderResource($calendar);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task- no permission by this name'], 403);
        }
    }

    public function update(Request $request, Calendar $calendar)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('calendar_update')) {
                // Update the calendar data using the request data
                $calendar->update($request->all());
                return new CalenderResource($calendar);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Calendar $calendar)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('calendar_destroy')) {
                $calendar->delete();
                return response()->json(['message' => 'Calendar deleted successfully']);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
