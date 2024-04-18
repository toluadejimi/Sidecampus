<?php

use App\Events\NewMessage;
use App\Events\RealTimeMessage;
use App\Http\Controllers\WebWelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Web\WelcomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\AuthController;

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


Route::get('login', [AuthController::class, 'login_view']);
Route::get('login', [AuthController::class, 'login_view'])->name('login');

Route::post('sign-in', [AuthController::class, 'login']);
Route::get('log-out', [AuthController::class, 'log_out']);






Route::get('/', [WelcomeController::class, 'index']);

Route::get('delete-account', [WebWelcomeController::class, 'delete_account_view']);
Route::post('delete-account-now', [WebWelcomeController::class, 'delete_account']);




Route::get('privacy', [WelcomeController::class, 'privacy']);



Route::get('admin', [AdminController::class, 'index']);
Route::get('book-list', [AdminController::class, 'booklist']);
Route::get('new-book', [AdminController::class, 'new_book_view']);
Route::post('add-new-book', [AdminController::class, 'add_new_book']);
Route::get('edit-book-view', [AdminController::class, 'edit_book_view']);
Route::post('edit-book', [AdminController::class, 'edit_book']);
Route::get('compress-book', [AdminController::class, 'compress_book']);
Route::get('delete-book', [AdminController::class, 'delete_book']);


Route::get('category', [AdminController::class, 'categories_list']);
Route::post('edit-category', [AdminController::class, 'edit_category']);
Route::get('delete-category', [AdminController::class, 'delete_category']);
Route::get('new-category', [AdminController::class, 'new_category_view']);
Route::post('add-new-category', [AdminController::class, 'add_new_category']);
Route::get('edit-category-view', [AdminController::class, 'edit_category_view']);


Route::get('author', [AdminController::class, 'author_list']);
Route::post('edit-author', [AdminController::class, 'edit_author']);
Route::get('delete-author', [AdminController::class, 'delete_author']);
Route::get('new-author', [AdminController::class, 'new_author_view']);
Route::post('add-new-author', [AdminController::class, 'add_new_author']);
Route::get('edit-author-view', [AdminController::class, 'edit_author_view']);



Route::get('users', [AdminController::class, 'user_list']);
Route::post('edit-user', [AdminController::class, 'edit_user']);
Route::get('delete-user', [AdminController::class, 'delete_user']);
Route::get('block-user', [AdminController::class, 'block_user']);
Route::get('edit-user-view', [AdminController::class, 'edit_user_view']);



Route::get('settings', [AdminController::class, 'setting']);
Route::post('update-plan', [AdminController::class, 'update_plan']);
Route::post('update-payment', [AdminController::class, 'update_payment']);
Route::post('update-setting', [AdminController::class, 'update_setting']);





Route::group(['middleware' => ['auth', 'user', 'session.timeout']], function () {


    Route::get('profile', [WelcomeController::class, 'profile']);
    Route::post('update-profile', [WelcomeController::class, 'update_profile']);

    Route::get('read', [WelcomeController::class, 'read']);
    Route::get('plan', [WelcomeController::class, 'plan']);





});





// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['prefix' => 'payment-mobile'], function () {
    Route::get('/', 'PaymentController@payment')->name('payment-mobile');
    Route::get('set-payment-method/{name}', 'PaymentController@set_payment_method')->name('set-payment-method');
});

Route::get('return', [PaymentController::class, 'return']);
Route::get('cancel', [PaymentController::class, 'payment_decline']);

Route::get('verify-payment', [PaymentController::class, 'verify_payment']);

Route::get('stripe', [PaymentController::class, 'stripe']);

Route::post('charge', [PaymentController::class, 'charge']);

Route::get('success', [PaymentController::class, 'success']);

Route::get('decline', [PaymentController::class, 'decline']);

Route::get('processing', [PaymentController::class, 'processing']);


Route::get('transaction', [PaymentController::class, 'ck_transaction']);






Route::post('pay-paypal', 'PaypalPaymentController@payWithpaypal')->name('pay-paypal');
Route::get('payment-success', 'PaymentController@success')->name('payment-success');
Route::get('payment-fail', 'PaymentController@fail')->name('payment-fail');
