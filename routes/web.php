<?php

use App\Http\Controllers\Landlord\PermissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TailwickController;
use App\Http\Controllers\Landlord\RoleController;
use App\Http\Controllers\Landlord\UserController;
use App\Http\Controllers\Landlord\TenantController;

require __DIR__ . '/auth.php';

Route::get('index/{locale}', [TailwickController::class, 'lang']); //languge support
Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

Route::middleware('auth')->group(function () {
    Route::get("/dashboard", [RouteController::class, 'index'])->name('dashboard');
    // Route::get("{any}", [RouteController::class, 'routes']);

    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('users', UserController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('tenants', TenantController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    // Route::resource('domains', DomainC::class);
});
