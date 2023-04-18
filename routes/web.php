<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin_contractController as Acontroller;
use App\Http\Controllers\LogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Users Routes //
Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['middleware' => ['can:admin.*']], function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/user/{id}/delete', [UserController::class, 'delete']);
    Route::get('user/{id}/edit', [UserController::class, 'show'])->name('user.edit');
    Route::put('user/{id}/update', [UserController::class, 'update'])->name('user.update');

    Route::get('users/new', [UserController::class, 'create'])->name('register');
    Route::post('users/new', [UserController::class, 'store']);

    Route::get('/admin/requests', [Acontroller::class, 'index'])->name('admin.user.requests');
    Route::get('/admin/request/{id}/edit', [Acontroller::class, 'edit'])->name('admin.user.requests.edit');
    Route::put('/admin/request/{id}/update', [Acontroller::class, 'update'])->name('admin.user.requests.update');
    Route::get('/admin/request/{id}/delete', [Acontroller::class, 'delete'])->name('admin.user.requests.delete');
    Route::get('/admin/request/{id}/pdf', [Acontroller::class, 'pdf'])->name('pdf.pdf');


    Route::get('/admin/user/mail/{invite}', [UserController::class, 'mail'])->name('user.mail');
    Route::get('/admin/user/invite', [UserController::class, 'invite'])->name('user.invite');
    Route::post('/admin/user/invite/store', [UserController::class, 'invitestore'])->name('user.invite.store');
});});
Route::get('/invite', [UserController::class, 'invitedUser'])->name('invited');
Route::post('/invite/', [UserController::class, 'invitedUserPass'])->name('invited.password');
Route::post('invite/store/{code}', [UserController::class, 'invitedUserStore'])->name('invited.store');


// End users routes //
// Event Routes //
//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/events', [EventController::class, 'index'])->name('events');
//    Route::get('/events/delete', [EventController::class, 'delete']);
//
////    Route::get('event/new', [EventController::class, 'create'])->name('event.create');
//    Route::post('event/new', [EventController::class, 'store'])->name('event.store');

//});

// End Event routes //
// Groups Routes //
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/groups', [GroupController::class, 'index'])->name('groups');
    Route::get('/group/{id}/chat', [GroupController::class, 'group'])->name('group.chat');
    Route::get('/group/{id}/settings', [GroupController::class, 'settings'])->name('group.settings');
    Route::get('/groups/create', [GroupController::class, 'create']);
    Route::put('/groups', [GroupController::class, 'store'])->name('groups.store');
    Route::delete('/groups/{id}/delete', [GroupController::class, 'delete'])->name('groups.delete');
    Route::get('/groups/{id}/remove/{user_id}', [GroupController::class, 'user_remove'])->name('groups.user.remove');
    Route::get('/groups/{id}/add/{user_id}', [GroupController::class, 'user_add'])->name('groups.user.add');
    Route::get('/user/{id}/contact', [UserController::class, 'contact_admin'])->name('user.askroles'); // niet gelukt qua styling
    Route::post('/user/{id}/contact', [UserController::class, 'contact_admin_post']);
});

// End Event routes //
//Status routes //
Route::get('/status', function () {return view('status');})->middleware(['auth', 'verified'])->name('status');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::put('/activate', [UserController::class, 'activate'])->name('activate');
    Route::put('/deactivate', [UserController::class, 'deactivate'])->name('deactivate');
});

// End Status routes //
// Standard laravel breeze routes //
Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



