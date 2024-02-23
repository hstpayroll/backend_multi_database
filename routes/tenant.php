<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
//api
use App\Http\Controllers\Api\V1\BankController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\CalendarController;
use App\Http\Controllers\Api\V1\CurrencyController;
use App\Http\Controllers\Api\V1\IncomeTaxController;
use App\Http\Controllers\Api\V1\FiscalYearController;
use App\Http\Controllers\Api\V1\PayrollNameController;
use App\Http\Controllers\Tenants\TenantUserController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\Api\V1\EmploymentTypeController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
//tenat
use App\Http\Controllers\Api\V1\TenantUserController as TenantUserControllerApi;
use App\Http\Controllers\Tenants\CompanyController as TenantCompanyControlle;
use App\Http\Controllers\Tenants\CurrencyController as TenantCurrencyControlle;
use App\Http\Controllers\Tenants\BankController as TenantBankControlle;

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
Route::middleware([
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class
])->prefix('api/v1')->group(function () {
    //
    require __DIR__ . '/tenant_api_auth.php';
    Route::name('api.')
    // ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('users', TenantUserControllerApi::class);
            // Route::apiResource('users', UserController::class);
        // Route::get('/users', [UserController::class,'index'])->middleware('can:user_index');
        // Route::post('/users', [UserController::class,'store']);
        // Route::post('/users', [UserController::class,'store'])->middleware('can:user_store');
        // Route::get('/users/{user}', [UserController::class,'show'])->middleware('can:user_show');
        // Route::put('/users/{user}', [UserController::class,'update'])->middleware('can:user_update');
        // Route::delete('/users/{user}', [UserController::class,'destroy'])->middleware('can:user_destroy');

        Route::apiResource('currencies', CurrencyController::class);
        Route::apiResource('banks', BankController::class);
        Route::apiResource('calenders', CalendarController::class);
        Route::apiResource('companies', CompanyController::class);
        Route::apiResource('employment-types', EmploymentTypeController::class);
        Route::apiResource('payroll-names', PayrollNameController::class);
        Route::apiResource('income-taxes', IncomeTaxController::class);
        Route::apiResource('fiscal-years', FiscalYearController::class);
    });
});


// The web start here
Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('tenants.auth.login');
    });
    Route::get('/dashboard', function () {
        return view('tenants.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('users', TenantUserController::class);
    Route::resource('companies', TenantCompanyControlle::class);
    Route::resource('currencies', TenantCurrencyControlle::class);
    Route::resource('banks', TenantCurrencyControlle::class);

    require __DIR__ . '/tenant_auth.php';
});

// Route::middleware(['api'])->prefix('api')->group(function () {
//     //
//     Route::get('test', function () {
//         return 'test!';
//     });
//  });
