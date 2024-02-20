<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BankController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\TenantController;
use App\Http\Controllers\Api\V1\CompanyController;
use App\Http\Controllers\Api\V1\CalendarController;
use App\Http\Controllers\Api\V1\CurrencyController;
use App\Http\Controllers\Api\V1\DomainController;
use App\Http\Controllers\Api\V1\IncomeTaxController;
use App\Http\Controllers\Api\V1\FiscalYearController;
use App\Http\Controllers\Api\V1\PayrollNameController;
use App\Http\Controllers\ApiAuth\NewPasswordController;
use App\Http\Controllers\ApiAuth\VerifyEmailController;
use App\Http\Controllers\Api\V1\EmploymentTypeController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\ApiAuth\RegisteredUserController;
use App\Http\Controllers\ApiAuth\PasswordResetLinkController;
use App\Http\Controllers\ApiAuth\AuthenticatedSessionController;
use App\Http\Controllers\ApiAuth\EmailVerificationNotificationController;





Route::prefix('v1')->group(function () {

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest')
        ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('login');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.store');

    Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['auth:sanctum', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:sanctum', 'throttle:6,1'])
        ->name('verification.send');

    // require __DIR__ . '/api_extended.php';
    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        Route::post('/validate-user', [AuthenticatedSessionController::class, 'validateUser'])
            ->name('validate-user');
            Route::apiResource('users', UserController::class);
            Route::apiResource('tenants', TenantController::class);
            Route::get('domain-exist', [DomainController::class, 'domain_exist'])->name('domain-exist');
            Route::apiResource('domains', DomainController::class)->only(['index']);
            Route::apiResource('roles', RoleController::class);
        });

    // user
});
