<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;


/*
|--------------------------------------------------------------------------
| Spatie Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['middleware' => ['can:app.setting.toggle']], function () {
        Route::controller(SettingController::class)->group(function () {
            Route::post('/setting/{id}/toggle', 'toggle')->name('setting.toggle');
        });
    });
});


