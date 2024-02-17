<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenants\TenantUserController;
use App\Http\Controllers\Api\V1\TenantUserController as TenantUserControllerApi;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

// Route::middleware([
//     // 'api',
//     'tenant',
//     // 'auth:sanctum',
//     InitializeTenancyByDomain::class,
//     PreventAccessFromCentralDomains::class,
// ])->prefix('v1')->group(function () {
//     dd("are you here");
//     Route::get('users', function () {
//         dd("are you here");
//     });
//     // Route::apiResource('users', TenantUserControllerApi::class);
// });
Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class
])->prefix('api/v1')->group(function () {
    //
    require __DIR__ . '/tenant_api_auth.php';
    Route::name('api.')->middleware('auth:sanctum')->group(function () {;
        Route::apiResource('users', TenantUserControllerApi::class);
    });
});

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('tenants.welcome');
    });
    Route::get('/dashboard', function () {
        return view('tenants.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', TenantUserController::class);

    require __DIR__ . '/tenant_auth.php';
});

// Route::middleware(['api'])->prefix('api')->group(function () {
//     //
//     Route::get('test', function () {
//         return 'test!';
//     });
//  });
