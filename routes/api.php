<?php

use App\Http\Controllers\api\AjaxController;
use App\Http\Controllers\api\UploadMediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for Handling Ajax Requests
Route::prefix('/ajax')->group(function () {

    // Routes for handling Location Module
    Route::get('/get-country-list', [AjaxController::class, 'getCountryList'])->name('ajax.get.country.list');
    Route::get('/get-state-list', [AjaxController::class, 'getStateList'])->name('ajax.get.state.list');
    Route::get('/get-city-list', [AjaxController::class, 'getCityList'])->name('ajax.get.city.list');
});

// Routes for handling Media Module
Route::prefix('/media')->group(function () {
    Route::post('/process', [UploadMediaController::class, 'upload'])->name('filepond.process');
    Route::delete('/delete', [UploadMediaController::class, 'delete'])->name('filepond.revert');
});

