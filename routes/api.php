<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialContoller;
use App\Http\Controllers\Auth\RegisterationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NumberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Virtual\VirtualaccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ProfileController;





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



//Contact
Route::get('contact', [ProfileController::class, 'contact']);


Route::group(['middleware' => ['auth:api', 'acess']], function () {


    //Payment
    Route::post('subscribe', [PaymentController::class, 'create_order']);
    Route::post('verify-payment', [PaymentController::class, 'verify_payment']);



    //Home
    Route::post('home', [HomeController::class, 'home']);
    Route::post('view-book', [HomeController::class, 'view_book']);
    Route::post('add-favorite', [HomeController::class, 'add_favorite']);
    Route::post('read-book', [HomeController::class, 'read_book']);
    Route::post('play-audio', [HomeController::class, 'play_audio']);
    Route::post('add-review', [HomeController::class, 'add_review']);
    Route::post('edit-review', [HomeController::class, 'edit_review']);




    //Search
    Route::post('search', [HomeController::class, 'search']);


    //Explore
    Route::post('get-all-books', [HomeController::class, 'get_all_books']);
    Route::post('get-by-category', [HomeController::class, 'get_by_category']);
    Route::post('get-by-audio', [HomeController::class, 'get_by_audio']);



    //Community
    Route::get('all-post', [SocialContoller::class, 'all_post']);
    Route::get('my-post', [SocialContoller::class, 'my_post']);
    Route::post('post', [SocialContoller::class, 'post']);
    Route::post('like-post', [SocialContoller::class, 'like']);
    Route::post('unlike-post', [SocialContoller::class, 'unlike']);
    Route::post('delete-post', [SocialContoller::class, 'delete']);
    Route::post('comment', [SocialContoller::class, 'comment']);
    Route::post('edit-comment', [SocialContoller::class, 'edit_comment']);
    Route::post('delete-comment', [SocialContoller::class, 'delete_comment']);


    //Profile
    Route::get('get-user', [ProfileController::class, 'get_user']);
    Route::post('update-user', [ProfileController::class, 'update_user']);
    Route::get('save-cards', [ProfileController::class, 'saved_cards']);
    Route::get('delete-account', [ProfileController::class, 'delete_account']);
    Route::get('contact-us', [ProfileController::class, 'contact_us']);
    Route::get('legal', [ProfileController::class, 'legal']);
    Route::get('delete-card', [ProfileController::class, 'delete_card']);



    


    

    







});
