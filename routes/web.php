<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\VerifyLogin;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home/en');
});

Route::get('/register/{locale?}', [RegisterController::class, 'viewForm']);
Route::post('/register-process', [RegisterController::class, 'register']);
Route::get('/register-payment/{locale?}-{id}-{price}', [RegisterController::class, 'viewPayment']);
Route::post('/register-payment-process', [RegisterController::class, 'checkPayment']);
// Route::get('/modal', [RegisterController::class, 'viewModal']);

Route::get('/login/{locale?}', [LoginController::class, 'viewLogin']);
Route::post('/login-process', [LoginController::class, 'login']);

Route::get('/home/{locale?}', [PageController::class, 'viewHome']);
// Route::get('/{locale?}', [PageController::class, 'viewHomeLanguage']);
Route::get('/gender-filter/{id}', [PageController::class, 'viewGender']);
Route::get('/search', [PageController::class, 'searchPeople']);

//harus login
Route::middleware([VerifyLogin::class])->group(function () {
    Route::get('/details/{id}-{sign}-{locale?}', [PageController::class, 'viewDetails']);
    // Route::get('/details-request/{id}', [PageController::class, 'viewDetailsRequest']);
    Route::get('/profile/{id}-{locale?}', [PageController::class, 'viewProfile']);
    Route::get('/filter}', [PageController::class, 'viewGender']);

    Route::get('/avatar', [PageController::class, 'viewAvatar']);
    Route::get('/sent-avatar/{id}-{locale?}', [PageController::class, 'viewSentAvatar']);
    Route::post('/purchase-avatar', [TransactionController::class, 'purchaseAvatar']);
    Route::post('/send-purchase-avatar/{locale?}', [TransactionController::class, 'sendPurchaseAvatar']);
    Route::get('/view-purchased-avatar/{locale?}', [PageController::class, 'viewPurchasedAvatar']);
    
    Route::get('/topUp', [PageController::class, 'viewTopUp']);
    Route::get('/topUp-process', [TransactionController::class, 'topUpProcess']);

    Route::get('/wishlist/{locale?}', [PageController::class, 'viewWishlist']);
    Route::post('/add-wishlist', [WishlistController::class, 'addWishlist']);
    Route::get('/friend-request/{locale?}', [PageController::class, 'viewRequest']);

    Route::post('/reject-request', [WishlistController::class, 'rejectRequest']);
    Route::post('/remove-wishlist', [WishlistController::class, 'removeWishlist']);
    Route::get('/videocall/{locale?}', [PageController::class, 'viewVideoCallFacility']);

    Route::get('/visibility-setting/{locale?}', [PageController::class, 'viewVisibilitySetting']);
    Route::get('/invisible', [TransactionController::class, 'setInvisible']);
    Route::get('/visible', [TransactionController::class, 'setVisible']);

    Route::get('/logout', [LoginController::class, 'logout']);
});