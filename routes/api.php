<?php

use App\Http\Controllers\APIController;
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

// search api
Route::get('/search', [APIController::class, 'searchCompanyProduct'])->name('api.search');

// Product Rate API
Route::post('/{type}/rate', [APIController::class, 'productRate'])->name('api.product.rate');
