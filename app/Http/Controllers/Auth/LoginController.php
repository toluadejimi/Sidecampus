<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\ApiKey;
use App\Models\MyPlan;
use App\Models\Feature;
use App\Models\PayInfo;
use App\Models\Setting;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\MyPhoneNumber;
use Laravel\Passport\Passport;
use App\Models\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{



    public $success = true;
    public $failed = false;



    public function login(Request $request)
    {




        $email = $request->email;
        $credentials = request(['email', 'password']);


        Passport::tokensExpireIn(Carbon::now()->addMinutes(50));
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(50));

        $check_status = User::where('email', $email)->first()->status ?? null;

        if ($check_status == 3) {

            return response()->json([
                'status' => $this->failed,
                'message' => 'Your account has restricted on Sidecampus',
            ], 401);
        }


        if (!auth()->attempt($credentials)) {
            return response()->json([
                'status' => $this->failed,
                'message' => 'Email or Password Incorrect'
            ], 401);
        }


        $get_token = OauthAccessToken::where('user_id', Auth::id())->first()->user_id ?? null;

        if($get_token != null){
            OauthAccessToken::where('user_id', Auth::id())->delete();
        }


        $get_device_id = Auth::user()->device_id ?? null;
        $get_ip = Auth::user()->ip_address ?? null;


        $get_device_id = User::where('device_id', $request->device_id)
            ->first()->device_id ?? null;

        if ($get_device_id == null) {

            $update = User::where('id', Auth::id())
                ->update([
                    'device_id' => $request->device_id ?? null,
                ]);
        }




        if (Auth::user()->status == 5) {
            return response()->json([
                'status' => $this->failed,
                'message' => 'You can not login at the moment, Please contact  support',
            ], 401);
        }


        $p = MyPlan::where('user_id', Auth::id())->first()->status ?? null;

        if ($p == 1) {
            $e_date = MyPlan::where('user_id', Auth::id())->first()->expires_at ?? null;
            $nowDate = date('Y-m-d');
            $endDate = Carbon::parse($e_date);
            $differenceInDays = $endDate->diffInDays($nowDate);

            MyPlan::where('user_id', Auth::id())->update([
                'days_remaining' => $differenceInDays,
            ]);

        }


        $exp = MyPlan::where('user_id', Auth::id())->first()->days_remaining ?? null;
        if ($exp == 0) {

            MyPlan::where('user_id', Auth::id())->update([
                'status' => 0,
            ]);
        }


            $token = auth()->user()->createToken('API Token')->accessToken;
            $myplan = MyPlan::select('status', 'subscribe_at','days_remaining','expires_at')->where('user_id', Auth::id())->first() ?? null;
            $plans = Plan::select('id','title','amount', 'period')->get() ?? null;
            $save_cards = PayInfo::where('user_id', Auth::id())->select('id','customer_id', 'brand', 'last4', 'exp_month', 'exp_year', 'name')->get();
            $favorite_book = Favorite::where('user_id', Auth::id())->select('book_image', 'title', 'author', 'dexcription')->get();


            $user = Auth()->user();
            $user['token'] = $token;
            $user['saved_card'] = $save_cards;
            $user['favorite_book'] = $favorite_book;



            return response()->json([
                'status' => $this->success,
                'message'=> "Login Successful",
                'data' => $user,
                'plans'=> $plans
            ], 200);

    }

}
