<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TailwickController;
use App\Http\Controllers\Landlord\TenantController;


require __DIR__ . '/auth.php';

Route::get('index/{locale}', [TailwickController::class, 'lang']); //languge support
Route::get('/', function () { return view('auth.login');});
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::middleware('auth')->group(function () {
    Route::get("/dashboard", [RouteController::class, 'index'])->name('dashboard');
    Route::get("{any}", [RouteController::class, 'routes']);

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('tenants', TenantController::class);
});


