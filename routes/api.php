<?php

use App\Models\PriceTags;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\DomainController;
use App\Http\Controllers\Api\V1\TenantController;
use App\Http\Controllers\Api\V1\PriceTagsController;
use App\Http\Controllers\Api\V1\PermissionController;
use App\Http\Controllers\ApiAuth\NewPasswordController;
use App\Http\Controllers\ApiAuth\VerifyEmailController;
use App\Http\Controllers\Api\V1\ClientRequestsController;
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


        Route::get('/client-requests', [ClientRequestsController::class, 'index'])
            ->name('client-requests');

        Route::apiResource('price-tags', PriceTagsController::class)->except('index');


        Route::post('users/assign-role/{user}', [UserController::class, 'assignRole'])->name('users.assign-role');
        Route::post('users/remove-role/{user}', [UserController::class, 'removeRole'])->name('users.remove-role');
        Route::apiResource('users', UserController::class);
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class)->only(['index', 'show']);
        Route::apiResource('tenants', TenantController::class);
        Route::apiResource('domains', DomainController::class)->only(['index']);
        Route::get('auth-user', [DomainController::class, 'auth_user'])->name('auth-user');
    });
    Route::get('domain-exist', [DomainController::class, 'domain_exist'])->name('domain-exist');

    Route::post('/client-requests', [ClientRequestsController::class, 'store'])
        ->middleware('guest')->name('client-requests');

    Route::get('/price-tags', [PriceTagsController::class, 'index'])
        ->middleware('guest')->name('price-tags');

    // user
});
