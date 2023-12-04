<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Plan;
use App\Models\User;
use App\Models\MyPlan;
use App\Models\PayInfo;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Models\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function login_view(request $request)
    {
        return view('login');
    }


    public function login(request $request)
    {


        $email = $request->email;
        $credentials = request(['email', 'password']);


        Passport::tokensExpireIn(Carbon::now()->addMinutes(50));
        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(50));

        $check_status = User::where('email', $email)->first()->status ?? null;

        if ($check_status == 3) {
               return back()->with('error','Your account has restricted on Sidecampus');
    
        }


        if (!auth()->attempt($credentials)) {
        return back()->with('error','Your Email or Password is Incorrect');
        }


        $get_token = OauthAccessToken::where('user_id', Auth::id())->first()->user_id ?? null;

        if ($get_token != null) {
            OauthAccessToken::where('user_id', Auth::id())->delete();
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


        $myplan = MyPlan::select('status', 'subscribe_at', 'days_remaining', 'expires_at')->where('user_id', Auth::id())->first() ?? null;
        $plans = Plan::select('id', 'title', 'amount', 'period')->get() ?? null;
        $save_cards = PayInfo::where('user_id', Auth::id())->select('id', 'customer_id', 'brand', 'last4', 'exp_month', 'exp_year', 'name')->get();
        $favorite_book = Favorite::where('user_id', Auth::id())->select('book_image', 'title', 'author', 'dexcription')->get();
        $myplan = MyPlan::select('status', 'subscribe_at', 'days_remaining', 'expires_at')->where('user_id', Auth::id())->first() ?? null;

        $data = Auth()->user();
        $data['saved_card'] = $save_cards;
        $data['favorite_book'] = $favorite_book;
        $data['my_plan'] = $myplan;
       
    


        if(Auth::user()->role == 'admin'){
            return redirect('admin')->with('message', 'Welcome Admin');
        }else{

            return redirect('/');

        }


    }


    public function log_out(){
        Auth::logout();
        return redirect('/');
    }
}
