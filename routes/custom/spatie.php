<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


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
    // Roles Routes //
    Route::group(['middleware' => ['can:admin.*']], function () {
        Route::controller(RoleController::class)->group(function () {
            Route::get('/roles', 'index')->name('roles');
            Route::get('/roles/create', 'create')->name('roles.create');
            Route::post('/roles', 'store')->name('roles.store');
            Route::delete('/roles/{id}/delete', 'delete')->name('roles.delete');
            Route::get('/roles/{id}/edit', 'show')->name('roles.edit');
            Route::put('/roles/{id}/update', 'update')->name('roles.update');
            Route::get('/addrole', 'add');
            // Remove And Add Roles //
            Route::get('/user/{id}/role/{role_id}/add', 'roleadd')->name('roles.add');
            Route::get('/user/{id}/role/{role_id}/remove', 'remove')->name('roles.remove');
        });
        // End roles routes //
        // Permission Routes //
        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permissions', 'index')->name('permissions');
            Route::get('/permissions/create', 'create')->name('permissions.create');
            Route::put('/permissions', 'store')->name('permissions.store');
            Route::delete('/permission/{id}/delete', 'delete')->name('permission.delete');

            // Remove And Add Perms //
            Route::get('/user/{id}/perm/{perm_id}/add', 'add')->name('permissions.add');
            Route::get('/user/{id}/perm/{perm_id}/remove', 'remove')->name('permissions.remove');
            Route::get('/role/{id}/perm/{perm_id}/add', 'addToRole')->name('permissions.addtorole');
            Route::get('/role/{id}/perm/{perm_id}/remove', 'removeFromRole')->name('permissions.removefromrole');
        });
        // End permission routes //
    });
    Route::group(['middleware' => ['can:supervisor can']], function () {
        Route::controller(PermissionController::class)->group(function () {
        //    Supervisor Mode //
        Route::get('/permissions/user/supervisor/on', 'supervisor_on')->name('supervisor.on');
        Route::get('/permissions/user/supervisor/off', 'supervisor_off')->name('supervisor.off');
    });    });

});


