<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserCredential;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\BreakfastController;
use App\Http\Controllers\LunchController;
use App\Http\Controllers\DinnerController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/addcart/{id}',[HomeController::class,'addcart'])->name('addcart');
Route::get('search',[HomeController::class,'search'])->name('search');

//=======> User Show Cart Items 
Route::get('show-cart-items', [HomeController::class,'showCart'])->name('show.cart.items');
Route::get('delete-cart-item/{id}', [HomeController::class,'destroy'])->name('delete.cart.item');

//=======> Login with Google
Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Route::get('login/google', [UserCredential::class, 'redirectToGoogle'])->name('login.google');
// Route::get('login/google/callback', [UserCredential::class, 'handleGoogleCallback']);

//=======> Login with Facebook
Route::get('login/facebook', [FacebookController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

// Route::get('login/facebook', [UserCredential::class, 'redirectToFacebook'])->name('login.facebook');
// Route::get('login/facebook/callback', [UserCredential::class, 'handleFacebookCallback']);

//========>User Login
Route::get('signup', [UserCredential::class, 'signup'])->name('user.signup');
Route::post('signup', [UserCredential::class, 'store'])->name('user.store');
Route::get('login', [UserCredential::class, 'login'])->name('user.login');
Route::post('login', [UserCredential::class, 'authenticate'])->name('user.authenticate');
Route::post('logout', [UserCredential::class, 'destroy'])->name('user.logout');


//========>Admin Login
// Route::middleware(['isAdmin'])->group(function()
// {
//     Route::resource('posts', 'AdminController');
// });
Route::get('admin-dashboard',[AdminLoginController::class,'index'])->name('admin.dashboard');
Route::get('admin-login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin-login', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');


//=======> Check out Controller
Route::get('checkout', [HomeController::class,'checkout'])->name('show.checkout');

//=======> Cash on Delivery
Route::get('cash-on-delivery',[StripePaymentController::class,'cash_delivery'])->name('cash.order');

//=======> Stripe Payment Controller
Route::get('stripe/{total}',[StripePaymentController::class,'stripe'])->name('stripe');
Route::post('stripe/{total}',[StripePaymentController::class, 'stripePost'])->name('stripe.post');

// Route::name('stripe')->group(function () {
//     Route::get('/{total}',[StripePaymentController::class,'stripe'])->name('stripe');
//     Route::post('/{total}',[StripePaymentController::class, 'stripePost'])->name('stripe.post');
// });

//=========...=======
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Route::middleware(['auth.sanctum','verified'])->get('/dashboard', function ()
// {
//     return view('dashboard');
// })->name('dashboard');

//===========> Admin Panel <===========


Route::get('users', [AdminController::class,'index'])->name('users');
Route::get('delete/{id}', [AdminController::class,'destroy'])->name('delete.user');

// //===========> Special Meal Offers ==> Dinner Controller ===========
Route::controller(AboutController::class)->group(function(){
    Route::get('search','search')->name('search');
    Route::get('show-about', 'index')->name('show.about');
    Route::get('create-about', 'create')->name('create.about');
    Route::post('store-about', 'store')->name('store.about');
    Route::post('store-about/{id}', 'store')->name('store.about');
    Route::get('edit-about/{id}', 'edit')->name('edit.about');
    Route::get('delete-about/{id}', 'destroy')->name('delete.about');
});


//===========> Food Controller <===========
Route::controller(FoodController::class)->group(function(){
    Route::get('search','search')->name('search');
    Route::get('show-foods', 'index')->name('show.foods');
    Route::get('create-food', 'create')->name('create.food');
    Route::post('store-food', 'store')->name('store.food');
    Route::post('store-food/{id}', 'store')->name('store.food');
    Route::get('edit-food/{id}', 'edit')->name('edit.food');
    Route::get('delete-food/{id}', 'destroy')->name('delete.food');
});

//=============> Reservation Controller <===========
Route::get('show-reservation', [ReservationController::class,'index'])->name('show.reservation');
Route::post('store-reservation', [ReservationController::class,'store'])->name('store.reservation');
Route::get('delete-reservation/{id}', [ReservationController::class,'destroy'])->name('delete.reservation');

//===========> Chef Controller <===========
Route::get('show-chefs', [ChefController::class,'index'])->name('show.chefs');
Route::get('create-chef', [ChefController::class,'create'])->name('create.chef');
Route::post('store-chef', [ChefController::class,'store'])->name('store.chef');
Route::post('store-chef/{id}', [ChefController::class,'store'])->name('store.chef');
Route::get('edit-chef/{id}', [ChefController::class,'edit'])->name('edit.chef');
Route::get('delete-chef/{id}', [ChefController::class,'destroy'])->name('delete.chef');

//===========> Special Meal Offers <===========
//===========> Special Meal Offers ==> BreakFast Controller ===========
Route::get('search',[BreakfastController::class,'search'])->name('search');
Route::get('show-breakfast', [BreakfastController::class,'index'])->name('show.breakfast');
Route::get('create-breakfast', [BreakfastController::class,'create'])->name('create.breakfast');
Route::post('store-breakfast', [BreakfastController::class,'store'])->name('store.breakfast');
Route::post('store-breakfast/{id}', [BreakfastController::class,'store'])->name('store.breakfast');
Route::get('edit-breakfast/{id}', [BreakfastController::class,'edit'])->name('edit.breakfast');
Route::get('delete-breakfast/{id}', [BreakfastController::class,'destroy'])->name('delete.breakfast');

//===========> Special Meal Offers ==> Lunch Controller ===========
Route::get('search',[LunchController::class,'search'])->name('search');
Route::get('show-lunch', [LunchController::class,'index'])->name('show.lunch');
Route::get('create-lunch', [LunchController::class,'create'])->name('create.lunch');
Route::post('store-lunch', [LunchController::class,'store'])->name('store.lunch');
Route::post('store-lunch/{id}', [LunchController::class,'store'])->name('store.lunch');
Route::get('edit-lunch/{id}', [LunchController::class,'edit'])->name('edit.lunch');
Route::get('delete-lunch/{id}', [LunchController::class,'destroy'])->name('delete.lunch');

// //===========> Special Meal Offers ==> Dinner Controller ===========
Route::get('search',[DinnerController::class,'search'])->name('search');
Route::get('show-dinner', [DinnerController::class,'index'])->name('show.dinner');
Route::get('create-dinner', [DinnerController::class,'create'])->name('create.dinner');
Route::post('store-dinner', [DinnerController::class,'store'])->name('store.dinner');
Route::post('store-dinner/{id}', [DinnerController::class,'store'])->name('store.dinner');
Route::get('edit-dinner/{id}', [DinnerController::class,'edit'])->name('edit.dinner');
Route::get('delete-dinner/{id}', [DinnerController::class,'destroy'])->name('delete.dinner');

// //===========> User Orders ===========
Route::get('show-orders', [OrderController::class,'index'])->name('show.orders');

// //===========> Order Deliever ===========
Route::get('order-delivered/{id}', [OrderController::class,'order_delivered'])->name('order.delivered');

// //===========> PDF Download ===========
Route::get('print-pdf/{id}', [OrderController::class,'print_pdf'])->name('print.PDF');

Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});