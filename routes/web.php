<?php

use App\Http\Controllers\UserBlogController;
use App\Http\Controllers\UserCompanyController;
use App\Http\Controllers\UserDealController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\UserForumController;
use App\Http\Controllers\UserJobController;
use App\Http\Controllers\UserProductController;
use App\Models\Company;
use App\Models\Product;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


Route::get('/', function () {
    // Forgot session
    Session::forget('menu');
    // Store Session for Home Menu Active
    Session::put('menu', 'home');
    $p = Product::where('is_approved', 1)->where('is_active', 1)->where('is_featured', 1)->get();
    $c = Company::where('is_approved', 1)->where('is_active', 1)->where('is_featured', 1)->get();
    $e = Event::where('is_approved', 1)->where('is_active', 1)->where('is_featured', 1)->get();
    $category = \App\Models\Category::where('is_active', 1)->orderBy('created_at', 'desc')->take(5)->get();
    // get the 10-random records from the database if is less than 10 then it will return all
    if(count($p) > 10){
        $products = $p->random(10);
    }else{
        $products = $p;
    }

    if(count($c) > 10){
        $companies = $c->random(10);
    }else{
        $companies = $c;
    }

    if(count($e) > 10){
        $events = $e->random(10);
    }else{
        $events = $e;
    }
    $data  = compact('products', 'companies', 'events', 'category');
    return view('welcome')->with($data);
})->name('home');

Route::prefix('company')->group(function () {
    Route::get('/', [UserCompanyController::class, 'viewCompanyList'])->name('company');
    Route::get('/{slug}', [UserCompanyController::class, 'viewCompanyDetails'])->name('view.company');
});

Route::prefix('product')->group(function () {
    Route::get('/', [UserProductController::class, 'viewProductList'])->name('products');
    Route::get('/{slug}', [UserProductController::class, 'viewProductDetails'])->name('view.product');
});

Route::prefix('event')->group(function () {
    Route::get('/', [UserEventController::class, 'viewEventList'])->name('events');
    Route::get('/{slug}', [UserEventController::class, 'viewEventDetails'])->name('view.event');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [UserBlogController::class, 'viewBlogList'])->name('blogs');
    Route::get('/{slug}', [UserBlogController::class, 'viewBlogDetails'])->name('view.blog');
});

Route::prefix('deal')->group(function () {
    Route::get('/', [UserDealController::class, 'viewDealList'])->name('deals');
    Route::get('/{slug}', [UserDealController::class, 'viewDealDetails'])->name('view.deal');
});

Route::prefix('job')->group(function () {
    Route::get('/', [UserJobController::class, 'viewJobList'])->name('jobs');
    Route::get('/{slug}', [UserJobController::class, 'viewJobDetails'])->name('view.job');
});

Route::prefix('forum')->group(function () {
    Route::get('/', [UserForumController::class, 'viewForumList'])->name('forum');
    Route::get('/{id}/{title}', [UserForumController::class, 'viewForumDetails'])->name('view.forum');
    Route::post('/answer-forum', [UserForumController::class, 'answerForum'])->name('forum.reply');
});

Route::post('/requirements/submit', function (Request $request){
    // upload images to server and get the path
    $images = [];

    if ($request->has('b64_img_1')) {
        $images[] = \App\classes\HelperFunctions::storeBase64Image($request->input('b64_img_1'), 'requirements', time());
    }
    if ($request->has('b64_img_2')) {
        $images[] = \App\classes\HelperFunctions::storeBase64Image($request->input('b64_img_2'), 'requirements', time());
    }
    if ($request->has('b64_img_3')) {
        $images[] = \App\classes\HelperFunctions::storeBase64Image($request->input('b64_img_3'), 'requirements', time());
    }
    $requirement = new \App\Models\Requirement();
    $requirement->subject = $request->subject;
    $requirement->country = $request->country;
    $requirement->customer_name = $request->customer_name;
    $requirement->email = $request->email;
    $requirement->phone = $request->phone;
    $requirement->description = $request->description;
    $requirement->images = json_encode($images);
    $requirement->status = 'Pending';
    $requirement->save();
    return redirect()->back()->with('success', 'Requirement submitted successfully');
})->name('requirements.submit');

Route::get('search', function (Request $request){
    $search = $request->search;
    $products = Product::where('name', 'like', '%'.$search.'%')->get();
    $companies = Company::where('name', 'like', '%'.$search.'%')->get();
    $events = Event::where('name', 'like', '%'.$search.'%')->get();
    $blogs = \App\Models\Blog::where('title', 'like', '%'.$search.'%')->get();
    $data = compact('products', 'companies', 'events');
    return view('pages.search')->with($data);
})->name('search');


