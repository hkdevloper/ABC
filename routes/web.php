<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DealController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\MembershipController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController as UserBlogController;
use App\Http\Controllers\CompanyController as UserCompanyController;
use App\Http\Controllers\DealController as UserDealController;
use App\Http\Controllers\EventController as UserEventController;
use App\Http\Controllers\JobController as UserJobController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserForumController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/* User Controllers */

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

/* --------------------- prefix routes for Admin Authentication --------------------- */
Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'viewAdminLogin'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('admin.login');
    Route::get('/logout', [AuthController::class, 'doLogout'])->name('admin.logout');
    Route::get('/forgot-password', [AuthController::class, 'viewForgotPassword'])->name('forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'doForgotPassword'])->name('forgot.password');
    Route::get('/reset-password', [AuthController::class, 'viewResetPassword'])->name('reset.password');
    Route::post('/reset-password', [AuthController::class, 'doResetPassword'])->name('reset.password');
});

/* --------------------- prefix routes for User Authentication --------------------- */
Route::prefix('/auth/user')->group(function () {
    Route::get('/login', [AuthController::class, 'viewUserLogin'])->name('user.login');
    Route::get('/register', [AuthController::class, 'viewUserRegister'])->name('user.register');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('user.login');
    Route::post('/register', [AuthController::class, 'doRegister'])->name('user.register');
    Route::get('/logout', [AuthController::class, 'doLogout'])->name('user.logout');
    Route::get('/forgot', [AuthController::class, 'viewUserForgotPassword'])->name('user.forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'doForgotPassword'])->name('forgot.password');
    Route::get('/reset', [AuthController::class, 'viewUserResetPassword'])->name('user.reset.password');
    Route::post('/reset-password', [AuthController::class, 'doResetPassword'])->name('reset.password');

    // Protected Routes
    Route::middleware(['web'])->group(function () {
        Route::get('/dashboard', [AuthController::class, 'userDashboard'])->name('user.dashboard');
        Route::get('/profile', [AuthController::class, 'viewUserProfile'])->name('user.profile');
        Route::post('/profile', [AuthController::class, 'doUserProfile'])->name('user.profile');
        Route::get('/change-password', [AuthController::class, 'viewUserChangePassword'])->name('user.change.password');
        Route::post('/change-password', [AuthController::class, 'doUserChangePassword'])->name('user.change.password');
    });
});

/* --------------------- prefix routes for Admin --------------------- */
Route::prefix('admin')->middleware(['admin-auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'adminDashboard']);

    // Routes for handling Company Module
    Route::prefix('/companies')->group(function () {
        Route::get('/', [CompanyController::class, 'viewCompanies'])->name('companies');
        Route::get('/add', [CompanyController::class, 'viewAddCompany'])->name('add.company');
        Route::post('/add', [CompanyController::class, 'doAddCompany'])->name('add.company');
        Route::get('/edit/{id}', [CompanyController::class, 'viewEditCompany'])->name('edit.company');
        Route::post('/edit/{id}', [CompanyController::class, 'doEditCompany'])->name('edit.company');
        Route::get('/delete/{id}', [CompanyController::class, 'doDeleteCompany'])->name('delete.company');
    });

    // Routes for handling Product Module
    Route::prefix('/products')->group(function () {
        Route::get('/', [ProductController::class, 'viewProducts'])->name('products');
        Route::get('/add', [ProductController::class, 'viewAddProduct'])->name('add.product');
        Route::post('/add', [ProductController::class, 'doAddProduct'])->name('add.product');
        Route::get('/edit/{id}', [ProductController::class, 'viewEditProduct'])->name('edit.product');
        Route::post('/edit/{id}', [ProductController::class, 'doEditProduct'])->name('edit.product');
        Route::get('/delete/{id}', [ProductController::class, 'doDeleteProduct'])->name('delete.product');
    });

    // Routes for handling Events Module
    Route::prefix('/event')->group(function () {
        Route::get('/', [EventController::class, 'viewEvents'])->name('events');
        Route::get('/add', [EventController::class, 'viewAddEvent'])->name('add.event');
        Route::post('/add', [EventController::class, 'doAddEvent'])->name('add.event');
        Route::get('/edit/{id}', [EventController::class, 'viewEditEvent'])->name('edit.event');
        Route::post('/edit/{id}', [EventController::class, 'doEditEvent'])->name('edit.event');
        Route::get('/delete/{id}', [EventController::class, 'doDeleteEvent'])->name('delete.event');
    });

    // Routes for Blog Module
    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'viewBlogs'])->name('blogs');
        Route::get('/add', [BlogController::class, 'viewAddBlog'])->name('add.blog');
        Route::post('/add', [BlogController::class, 'doAddBlog'])->name('add.blog');
        Route::get('/edit/{id}', [BlogController::class, 'viewEditBlog'])->name('edit.blog');
        Route::post('/edit/{id}', [BlogController::class, 'doEditBlog'])->name('edit.blog');
        Route::get('/delete/{id}', [BlogController::class, 'doDeleteBlog'])->name('delete.blog');
    });

    // Routes for handling Deals Module
    Route::prefix('/deals')->group(function () {
        Route::get('/', [DealController::class, 'viewDeals'])->name('deals');
        Route::get('/add', [DealController::class, 'viewAddDeal'])->name('add.deal');
        Route::post('/add', [DealController::class, 'doAddDeal'])->name('add.deal');
        Route::get('/edit/{id}', [DealController::class, 'viewEditDeal'])->name('edit.deal');
        Route::post('/edit/{id}', [DealController::class, 'doEditDeal'])->name('edit.deal');
        Route::get('/delete/{id}', [DealController::class, 'doDeleteDeal'])->name('delete.deal');
    });

    // Routes for handling Jobs Module
    Route::prefix('/jobs')->group(function () {
        Route::get('/', [JobController::class, 'viewJobs'])->name('jobs');
        Route::get('/add', [JobController::class, 'viewAddJob'])->name('add.job');
        Route::post('/add', [JobController::class, 'doAddJob'])->name('add.job');
        Route::get('/edit/{id}', [JobController::class, 'viewEditJob'])->name('edit.job');
        Route::post('/edit/{id}', [JobController::class, 'doEditJob'])->name('edit.job');
        Route::get('/delete/{id}', [JobController::class, 'doDeleteJob'])->name('delete.job');
    });

    // Routes for handling SelectCategory Module
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'viewCategories'])->name('categories');
        Route::get('/add', [CategoryController::class, 'viewAddCategory'])->name('add.category');
        Route::post('/add', [CategoryController::class, 'doAddCategory'])->name('add.category');
        Route::get('/edit/{id}', [CategoryController::class, 'viewEditCategory'])->name('edit.category');
        Route::post('/edit/{id}', [CategoryController::class, 'doEditCategory'])->name('edit.category');
        Route::get('/delete/{id}', [CategoryController::class, 'doDeleteCategory'])->name('delete.category');
    });

    // Routes for handling Review Module
    Route::prefix('/reviews')->group(function () {
        Route::get('/', [ReviewController::class, 'viewReviews'])->name('reviews');
        Route::get('/add', [ReviewController::class, 'viewAddReview'])->name('add.review');
        Route::post('/add', [ReviewController::class, 'doAddReview'])->name('add.review');
        Route::get('/edit/{id}', [ReviewController::class, 'viewEditReview'])->name('edit.review');
        Route::post('/edit/{id}', [ReviewController::class, 'doEditReview'])->name('edit.review');
        Route::get('/delete/{id}', [ReviewController::class, 'doDeleteReview'])->name('delete.review');
    });

    // Routes for handling Membership Module
    Route::prefix('/memberships')->group(function () {
        Route::get('/', [MembershipController::class, 'viewMemberships'])->name('memberships');
        Route::get('/add', [MembershipController::class, 'viewAddMembership'])->name('add.membership');
        Route::post('/add', [MembershipController::class, 'doAddMembership'])->name('add.membership');
        Route::get('/edit/{id}', [MembershipController::class, 'viewEditMembership'])->name('edit.membership');
        Route::post('/edit/{id}', [MembershipController::class, 'doEditMembership'])->name('edit.membership');
        Route::get('/delete/{id}', [MembershipController::class, 'doDeleteMembership'])->name('delete.membership');

        // Routes for handling Membership Plan Module
        Route::prefix('/plans')->group(function () {
            Route::get('/', [MembershipController::class, 'viewMembershipPlans'])->name('membership.plans');
            Route::get('/add', [MembershipController::class, 'viewAddMembershipPlan'])->name('add.membership.plan');
            Route::post('/add', [MembershipController::class, 'doAddMembershipPlan'])->name('add.membership.plan');
            Route::get('/edit/{id}', [MembershipController::class, 'viewEditMembershipPlan'])->name('edit.membership.plan');
            Route::post('/edit/{id}', [MembershipController::class, 'doEditMembershipPlan'])->name('edit.membership.plan');
            Route::get('/delete/{id}', [MembershipController::class, 'doDeleteMembershipPlan'])->name('delete.membership.plan');
        });
    });

    // Routes for handling Invoice Module
    Route::prefix('/invoices')->group(function () {
        Route::get('/', [InvoiceController::class, 'viewInvoices'])->name('invoices');
        Route::get('/add', [InvoiceController::class, 'viewAddInvoice'])->name('add.invoice');
        Route::post('/add', [InvoiceController::class, 'doAddInvoice'])->name('add.invoice');
        Route::get('/edit/{id}', [InvoiceController::class, 'viewEditInvoice'])->name('edit.invoice');
        Route::post('/edit/{id}', [InvoiceController::class, 'doEditInvoice'])->name('edit.invoice');
        Route::get('/delete/{id}', [InvoiceController::class, 'doDeleteInvoice'])->name('delete.invoice');
    });

    // Routes for handling SelectUser Module
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

        // Rating Categories
        Route::get('/rating-categories', [SettingsController::class, 'viewRatingCategories'])->name('settings.rating.categories');
        Route::get('/rating-categories/add', [SettingsController::class, 'viewAddRatingCategories'])->name('settings.rating.categories.add');
        Route::post('/rating-categories/add', [SettingsController::class, 'doAddRatingCategories'])->name('settings.rating.categories.add');
        Route::get('/rating-categories/edit/{id}', [SettingsController::class, 'viewEditRatingCategories'])->name('settings.rating.categories.edit');
        Route::post('/rating-categories/edit/{id}', [SettingsController::class, 'doEditRatingCategories'])->name('settings.rating.categories.edit');
        Route::get('/rating-categories/delete/{id}', [SettingsController::class, 'doDeleteRatingCategories'])->name('settings.rating.categories.delete');

    });
});

/* --------------------- prefix routes for User --------------------- */

Route::get('/', function () {
    // Forgot session
    Session::forget('menu');
    // Store Session for Home Menu Active
    Session::put('menu', 'home');
    return view('welcome');
})->name('home');

Route::prefix('company')->group(function () {
    Route::get('/', [UserCompanyController::class, 'viewCompanyList'])->name('company');
    Route::get('/{name}', [UserCompanyController::class, 'viewCompanyDetails'])->name('view.company');
});

Route::prefix('product')->group(function () {
    Route::get('/', [UserProductController::class, 'viewProductList'])->name('products');
    Route::get('/{name}', [UserProductController::class, 'viewProductDetails'])->name('view.product');
});

Route::prefix('event')->group(function () {
    Route::get('/', [UserEventController::class, 'viewEventList'])->name('events');
    Route::get('/{name}', [UserEventController::class, 'viewEventDetails'])->name('view.event');
});

Route::prefix('blog')->group(function () {
    Route::get('/', [UserBlogController::class, 'viewBlogList'])->name('blogs');
    Route::get('/{name}', [UserBlogController::class, 'viewBlogDetails'])->name('view.blog');
});

Route::prefix('deal')->group(function () {
    Route::get('/', [UserDealController::class, 'viewDealList'])->name('deals');
    Route::get('/{name}', [UserDealController::class, 'viewDealDetails'])->name('view.deal');
});

Route::prefix('job')->group(function () {
    Route::get('/', [UserJobController::class, 'viewJobList'])->name('jobs');
    Route::get('/{name}', [UserJobController::class, 'viewJobDetails'])->name('view.job');
});

Route::prefix('forum')->group(function () {
    Route::get('/', [UserForumController::class, 'viewForumList'])->name('forum');
    Route::get('/{name}', [UserForumController::class, 'viewForumDetails'])->name('view.forum');
});

