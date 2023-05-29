<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// prefix routes for Administrator
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'viewAdminLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'doLogin']);
    Route::get('/logout', [AuthController::class, 'doLogout']);
    Route::get('/forgot-password', [AuthController::class, 'viewForgotPassword'])->name('forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'doForgotPassword'])->name('forgot.password');
    Route::get('/reset-password', [AuthController::class, 'viewResetPassword'])->name('reset.password');
    Route::post('/reset-password', [AuthController::class, 'doResetPassword'])->name('reset.password');

});

// prefix protected routes for Administrator
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'adminDashboard']);

    // Routes for handling User Module
    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'viewUsers'])->name('users');
        Route::get('/add', [UserController::class, 'viewAddUser'])->name('add.user');
        Route::post('/add', [UserController::class, 'doAddUser'])->name('add.user');
        Route::get('/edit/{id}', [UserController::class, 'viewEditUser'])->name('edit.user');
        Route::post('/edit/{id}', [UserController::class, 'doEditUser'])->name('edit.user');
        Route::get('/delete/{id}', [UserController::class, 'doDeleteUser'])->name('delete.user');

        // Routes for handling user group module
        Route::prefix('/groups')->group(function () {
            Route::get('/', [UserController::class, 'viewUserGroups'])->name('user.groups');
            Route::get('/add', [UserController::class, 'viewAddUserGroup'])->name('add.user.group');
            Route::post('/add', [UserController::class, 'doAddUserGroup'])->name('add.user.group');
            Route::get('/edit/{id}', [UserController::class, 'viewEditUserGroup'])->name('edit.user.group');
            Route::post('/edit/{id}', [UserController::class, 'doEditUserGroup'])->name('edit.user.group');
            Route::get('/delete/{id}', [UserController::class, 'doDeleteUserGroup'])->name('delete.user.group');
        });
    });

    // Routes for handling Location Module
    Route::prefix('/locations')->group(function () {
        Route::get('/', [LocationController::class, 'viewLocations'])->name('locations');
        Route::get('/add', [LocationController::class, 'viewAddLocation'])->name('add.location');
        Route::post('/add', [LocationController::class, 'doAddLocation'])->name('add.location');
        Route::get('/edit/{id}', [LocationController::class, 'viewEditLocation'])->name('edit.location');
        Route::post('/edit/{id}', [LocationController::class, 'doEditLocation'])->name('edit.location');
        Route::get('/delete/{id}', [LocationController::class, 'doDeleteLocation'])->name('delete.location');
    });

    // Routes for handling Medias
    Route::prefix('/medias')->group(function () {
        Route::get('/', [MediaController::class, 'viewMedia'])->name('media');
        Route::get('/delete/{id}', [MediaController::class, 'doDeleteMedia'])->name('delete.media');
    });
});



