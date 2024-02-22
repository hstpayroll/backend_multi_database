<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BankController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\CalendarController;
use App\Http\Controllers\Api\V1\CitizenshipController;
use App\Http\Controllers\Api\V1\CostCenterController;
use App\Http\Controllers\Api\V1\CurrencyController;
use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\IncomeTaxController;
use App\Http\Controllers\Api\V1\FiscalYearController;
use App\Http\Controllers\Api\V1\PayrollNameController;
use App\Http\Controllers\Tenants\TenantUserController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use App\Http\Controllers\Api\V1\EmploymentTypeController;
use App\Http\Controllers\Api\V1\GradeController;
use App\Http\Controllers\Api\V1\PayrollPeriodController;
use App\Http\Controllers\Api\V1\PositionController;
use App\Http\Controllers\Api\V1\SubDepartmentController;
use App\Http\Controllers\Api\V1\TaxRegionController;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\Api\V1\TenantUserController as TenantUserControllerApi;

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
            Route::apiResource('cost-centers', CostCenterController::class);
            Route::apiResource('payroll-periods', PayrollPeriodController::class);
            Route::apiResource('departments', DepartmentController::class);
            Route::apiResource('sub-departments', SubDepartmentController::class);
            Route::apiResource('tax-regions', TaxRegionController::class);
            Route::apiResource('grades', GradeController::class);
            Route::apiResource('citizenships', CitizenshipController::class);
            Route::apiResource('positions', PositionController::class);

        });
});


// The web start here
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
