<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Tenant\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Resources\Finance\CurrencyResource;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('currency_index')) {
                $currencies = Currency::paginate(10); // You can adjust the number of items per page as needed
                return CurrencyResource::collection($currencies);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function store(StoreCurrencyRequest $request)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('currency_store')) {
                $currency = Currency::create($request->validated());
                return new CurrencyResource($currency);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function show(Request $request, Currency $currency)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('currency_show')) {
                return new CurrencyResource($currency);
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function update(StoreCurrencyRequest $request, Currency $currency)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('currency_update')) {
                $currency->update($request->validated());
                return new CurrencyResource($currency->refresh());
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }

    public function destroy(Request $request, Currency $currency)
    {
        try {
            $user = $request->user();
            if ($user->hasPermissionTo('currency_destroy')) {
                $currency->delete();
                return response()->noContent();
            } else {
                return response()->json(['message' => 'Unauthorized for this task'], 403);
            }
        } catch (PermissionDoesNotExist $exception) {
            return response()->json(['message' => 'Unauthorized for this task - no permission by this name'], 403);
        }
    }
}
