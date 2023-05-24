<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

// prefix routes
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'adminLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'doLogin']);
    Route::get('/logout', [AuthController::class, 'doLogout']);

    // Protected routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'adminDashboard']);
    });
});


