<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\RazorpayController;
use App\Models\BlockedDomain;
use App\Models\User;
use Filament\Notifications\Auth\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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
Route::post('/123', function (Request $request){
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
    ]);
    // Spam Email Check
    $spamEmails = BlockedDomain::where('status', 1)->pluck('domain')->toArray();
    foreach ($spamEmails as $spamEmail) {
        if (str_contains(strtolower($request->email), strtolower($spamEmail))) {
            return redirect()->back()->with('error', 'This email is not allowed')->withInput();
        }
    }
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->saveOrFail();
    try {
        if (!$user instanceof MustVerifyEmail) {
            return redirect()->back()->with('success', 'Registered successfully');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->back()->with('success', 'Registered successfully');
        }

        if (!method_exists($user, 'notify')) {
            $userClass = $user::class;

            throw new Exception("Model [$userClass] does not have a [notify()] method.");
        }

        $notification = new VerifyEmail();
        $notification->url = URL::temporarySignedRoute(
            'filament.panel.auth.email-verification.verify',
            now()->addMinutes(config('auth.verification.expire', 60)),
            [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
                ...[],
            ],
        );
        $user->notify($notification);
        Auth::login($user);
        return redirect()->back();
    } catch (Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
})->name('api.test');
