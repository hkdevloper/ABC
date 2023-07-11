<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TypeController;
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
    Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.login');
    Route::get('/logout', [AuthController::class, 'doLogout'])->name('admin.logout');
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
        Route::get('/add/multiple', [LocationController::class, 'viewAddMultipleLocations'])->name('add.multiple.location');
        Route::post('/add/multiple', [LocationController::class, 'doAddMultipleLocations'])->name('add.multiple.location');
        Route::get('/edit/{id}', [LocationController::class, 'viewEditLocation'])->name('edit.location');
        Route::post('/edit/{id}', [LocationController::class, 'doEditLocation'])->name('edit.location');
        Route::get('/delete/{id}', [LocationController::class, 'doDeleteLocation'])->name('delete.location');
    });

    // Routes for handling Medias
    Route::prefix('/medias')->group(function () {
        Route::get('/', [MediaController::class, 'viewMedia'])->name('media');
        Route::get('/delete/{id}', [MediaController::class, 'doDeleteMedia'])->name('delete.media');
    });

    // Routes for handling Settings module
    Route::prefix('/settings')->group(function () {
        Route::get('/', [SettingsController::class, 'viewSettings'])->name('settings');

        // Payment gateways
        Route::get('/payment-gateways', [SettingsController::class, 'viewPaymentGateways'])->name('settings.payment.gateways');
        Route::get('/payment-gateways/edit/{id}', [SettingsController::class, 'viewEditPaymentGateway'])->name('settings.edit.payment.gateways');
        Route::post('/payment-gateways/edit/{id}', [SettingsController::class, 'doEditPaymentGateway'])->name('settings.edit.payment.gateways');

        // Discounts
        Route::get('/discounts', [SettingsController::class, 'viewDiscounts'])->name('settings.discounts');

        // Tax Rates
        Route::get('/tax-rates', [SettingsController::class, 'viewTaxRates'])->name('settings.tax.rates');
        Route::get('/tax-rates/add', [SettingsController::class, 'viewAddTaxRates'])->name('settings.tax.rates.add');
        Route::post('/tax-rates/add', [SettingsController::class, 'doAddTaxRates'])->name('settings.tax.rates.add');
        Route::get('/tax-rates/edit/{id}', [SettingsController::class, 'viewEditTaxRates'])->name('settings.tax.rates.edit');
        Route::post('/tax-rates/edit/{id}', [SettingsController::class, 'doEditTaxRates'])->name('settings.tax.rates.edit');
        Route::get('/tax-rates/delete/{id}', [SettingsController::class, 'doDeleteTaxRate'])->name('settings.tax.rates.delete');


        Route::get('/language', [SettingsController::class, 'viewLanguage'])->name('settings.language');
        Route::get('/upload-types', [SettingsController::class, 'viewUploadTypes'])->name('settings.upload.types');

        // Rating Categories
        Route::get('/rating-categories', [SettingsController::class, 'viewRatingCategories'])->name('settings.rating.categories');
        Route::get('/rating-categories/add', [SettingsController::class, 'viewAddRatingCategories'])->name('settings.rating.categories.add');
        Route::post('/rating-categories/add', [SettingsController::class, 'doAddRatingCategories'])->name('settings.rating.categories.add');
        Route::get('/rating-categories/edit/{id}', [SettingsController::class, 'viewEditRatingCategories'])->name('settings.rating.categories.edit');
        Route::post('/rating-categories/edit/{id}', [SettingsController::class, 'doEditRatingCategories'])->name('settings.rating.categories.edit');
        Route::get('/rating-categories/delete/{id}', [SettingsController::class, 'doDeleteRatingCategories'])->name('settings.rating.categories.delete');

        // Scheduled Tasks
        Route::get('/scheduled-tasks', [SettingsController::class, 'viewScheduledTasks'])->name('settings.scheduled.tasks');
    });
});



