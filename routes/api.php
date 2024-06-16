<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\RazorpayController;
use App\Models\User;
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

// Search Api For Module Pages
Route::prefix('search')->group(function(){
    Route::get('/company', [APIController::class, 'searchCompanies'])->name('api.search.company');
    Route::get('/product', [APIController::class, 'searchCompanyProduct'])->name('api.search.product');
    Route::get('/deals', [APIController::class, 'searchDeals'])->name('api.search.deals');
    Route::get('/events', [APIController::class, 'searchEvents'])->name('api.search.events');
    Route::get('/jobs', [APIController::class, 'searchJobs'])->name('api.search.jobs');
    Route::get('/blogs', [APIController::class, 'searchBlogs'])->name('api.search.blogs');
    Route::get('/forums', [APIController::class, 'searchForums'])->name('api.search.forums');
});

Route::prefix('razorpay')->group(function(){
    Route::post('/order', [RazorpayController::class, 'createPaymentOrder'])->name('api.razorpay.order.create');
    Route::post('/handle', [RazorpayController::class,'handlePayment'])->name('api.razorpay.payment.verify');
});

// Test Routes
Route::get('/test', function (Request $request){
    $data = [];
    $data = User::find(3);
    return response()->json($data->company);
})->name('api.test');
