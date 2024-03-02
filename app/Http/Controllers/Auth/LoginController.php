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

        if ($get_token != null) {
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
        $myplan = MyPlan::select('status', 'subscribe_at', 'days_remaining', 'expires_at')->where('user_id', Auth::id())->first() ?? null;
        $plans = Plan::select('id', 'title', 'amount', 'period')->get() ?? null;
        $save_cards = PayInfo::where('user_id', Auth::id())->select('id', 'customer_id', 'brand', 'last4', 'exp_month', 'exp_year', 'name')->get();
        $favorite_book = Favorite::where('user_id', Auth::id())->select('book_image', 'title', 'author', 'dexcription')->get();
        $myplan = MyPlan::select('status', 'subscribe_at', 'days_remaining', 'expires_at')->where('user_id', Auth::id())->first() ?? null;
        $keys = Setting::select('stripe_s', 'stripe_p')->where('id', 1)->get();
        $abusive_words = ["Fuck", "Pussy", 'arse', 'arsehole', 'as useful as tits on a bull', 'balls', 'bastard', 'beaver', 'beef curtains', 'bell', 'bellend', 'bent', 'berk', 'bint', 'bitch', 'blighter', 'blimey', 'bitch', 'blimey reilly', 'bloodclaat', 'bloody', 'bloody hell', 'blooming', 'bollocks', 'bonk', 'bugger', 'bugger me', 'bugger off', 'built like a brick shit-house', 'bukkake', 'bullshit', 'cack', 'cad', 'chav', 'cheese eating surrender monkey', 'choad', 'chuffer', 'clunge', 'cobblers', 'cock', 'cock cheese', 'cock jockey', 'cock-up', 'cocksucker', 'cockwomble', 'codger', 'cor blimey', 'corey', 'cow', 'crap', 'crikey', 'cunt', 'daft', 'daft cow', 'damn', 'dick', 'dickhead', 'did he bollocks!', 'did i fuck as like!', 'dildo', 'dodgy', 'duffer', 'fanny', 'feck', 'flaps', 'fuck', 'fuck me sideways!', 'fucking cunt', 'fucktard', 'gash', 'ginger', 'git', 'gob shite', 'goddam', 'gorblimey', 'gordon bennett', 'gormless', 'he’s a knob', 'hell', 'hobknocker', 'I\'d rather snort my own cum', 'jesus christ', 'jizz', 'knob', 'knobber', 'knobend', 'knobhead', 'ligger', 'like fucking a dying man\'s handshake', 'mad as a hatter', 'manky', 'minge', 'minger', 'minging', 'motherfucker', 'munter', 'muppet', 'naff', 'nitwit', 'nonce', 'numpty', 'nutter', 'off their rocker', 'penguin', 'pillock', 'pish', 'piss off', 'piss-flaps', 'pissed', 'pissed off', 'play the five-fingered flute', 'plonker', 'ponce', 'poof', 'pouf', 'poxy', 'prat', 'prick', 'prick', 'prickteaser', 'punani', 'punny', 'pussy', 'randy', 'rapey', 'rat arsed', 'rotter', 'rubbish', 'scrubber', 'shag', 'shit', 'shite', 'shitfaced', 'skank', 'slag', 'slapper', 'slut', 'snatch', 'sod', 'sod-off', 'son of a bitch', 'spunk', 'stick it up your arse!', 'swine', 'taking the piss', 'tart', 'tits', 'toff', 'tosser', 'trollop', 'tuss', 'twat', 'twonk', 'u fukin wanker', 'wally', 'wanker', 'wankstain', 'wazzack', 'whore'];

        $inapp_ios_purchase = Plan::select('inapp_ios_purchase')->where('id', 1)->first()->inapp_ios_purchase ?? null;

        $user = Auth()->user();
        $user['token'] = $token;
        $user['saved_card'] = $save_cards;
        $user['favorite_book'] = $favorite_book;
        $user['my_plan'] = $myplan;
        $user['keys'] = $keys;
        $user['inapp_ios_purchase'] = [$inapp_ios_purchase];
        $user['abusive_words'] = $abusive_words;


        return response()->json([
            'status' => $this->success,
            'message' => "Login Successful",
            'data' => $user,
            'plans' => $plans
        ], 200);

    }

}
