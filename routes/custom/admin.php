<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;


/*
|--------------------------------------------------------------------------
| AdminRoutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['middleware' => ['can:admin.*']], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/admin/panel', 'adminpanel')->name('panel'); //Route To admin panel
        });
        Route::get('/logs', [LogController::class, 'index'])->name('logs'); // Route to check all logs
    });
});


