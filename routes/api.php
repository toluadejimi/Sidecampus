<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Virtual\VirtualaccountController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




//Registration
Route::post('verify-email', [RegisterationController::class, 'email_verification']);
Route::post('resend-otp-code', [RegisterationController::class, 'resend_email_otp']);
Route::post('verify-email-otp', [RegisterationController::class, 'verify_email_otp']);
Route::post('register', [RegisterationController::class, 'register']);
Route::post('forgot-password', [RegisterationController::class, 'forgot_password']);
Route::post('reset-password', [RegisterationController::class, 'reset_password']);


Route::get('slider', [HomeController::class, 'home']);



















//login
Route::post('login', [LoginController::class, 'login']);




//Transactions
Route::post('transaction-status', [TransactionController::class, 'transactiion_status']);
Route::post('test-transaction', [TransactionController::class, 'test_transaction']);









Route::post('transfer-reverse', [TransactionController::class, 'transfer_reverse']);

Route::post('pending-transaction', [TransactionController::class, 'pending_transaction']);










//Get Pool Banalce
Route::get('pool-balance', [TransactionController::class, 'pool_account']);

//Get Data Plans

//Get State
Route::get('get-states', [RegisterationController::class, 'get_states']);

//Get Lga
Route::post('get-lga', [RegisterationController::class, 'get_lga']);


//ENKPAY POS
Route::post('pos', [EnkpayposController::class, 'enkpayPos']);
Route::post('pos-logs', [EnkpayposController::class, 'enkpayPosLogs']);





//Charges
Route::get('transfer-charges', [TransactionController::class, 'transfer_charges']);

//Get Token
Route::get('get-token', [TransactionController::class, 'get_token']);

//Get All virtual acount
Route::get('all-virtual-account', [VirtualaccountController::class, 'get_created_account']);
Route::get('account-history', [VirtualaccountController::class, 'virtual_acct_history']);

//Login
Route::post('phone-login', [LoginController::class, 'phone_login']);
Route::post('pin-login', [LoginController::class, 'pin_login']);

Route::post('email-login', [LoginController::class, 'email_login']);

Route::post('update-device', [LoginController::class, 'update_device_identifier']);


//Contact
Route::get('contact', [ProfileController::class, 'contact']);


Route::group(['middleware' => ['auth:api', 'acess']], function () {


    //Payment
    Route::post('subscribe', [PaymentController::class, 'create_order']);
    Route::post('verify-payment', [PaymentController::class, 'verify_payment']);

    Route::post('home', [HomeController::class, 'home']);
    Route::post('view-book', [HomeController::class, 'view_book']);
    Route::post('add-favorite', [HomeController::class, 'add_favorite']);
    Route::post('read-book', [HomeController::class, 'read_book']);
    Route::post('play-audio', [HomeController::class, 'play_audio']);

    Route::post('add-review', [HomeController::class, 'add_review']);


    Route::post('search', [HomeController::class, 'search']);

    Route::post('get-all-books', [HomeController::class, 'get_all_books']);
    Route::post('get-by-category', [HomeController::class, 'get_by_category']);
    Route::post('get-by-audio', [HomeController::class, 'get_by_audio']);




















    Route::post('get-list-numbers', [NumberController::class, 'get_list_numbers']);
    Route::post('buy-number', [NumberController::class, 'buy_number']);
    Route::post('delete-number', [NumberController::class, 'delete_number']);
    Route::post('send-message', [NumberController::class, 'send_message']);
    Route::get('get-user', [ProfileController::class, 'get_user']);
    Route::get('get-messages', [NumberController::class, 'get_message']);
    Route::get('open-message', [NumberController::class, 'open_message']);
    Route::get('get-a-message', [NumberController::class, 'get_a_message']);
    Route::post('initiate-call', [NumberController::class, 'start_call']);




});
