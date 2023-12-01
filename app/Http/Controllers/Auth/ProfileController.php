<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\MyPlan;
use App\Models\OldUser;
use App\Models\PayInfo;
use App\Models\Setting;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\MyPhoneNumber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{


   




    public function get_user(Request $request)
    {

       
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


        $GetToken = $request->header('Authorization');
        $string = $GetToken;
        $toBeRemoved = "Bearer ";
        $token = str_replace($toBeRemoved, "", $string);
        $myplan = MyPlan::select('status', 'subscribe_at','days_remaining','expires_at')->where('user_id', Auth::id())->first() ?? null;
        $user = Auth()->user();
        $save_cards = PayInfo::where('user_id', Auth::id())->select('customer_id', 'brand', 'last4', 'exp_month', 'exp_year', 'name')->get();
        $favorite_book = Favorite::where('user_id', Auth::id())->select('book_image', 'title', 'author', 'dexcription')->get();

        $user['token'] = $token;
        $user['my_plan'] = $myplan;
        $user['saved_card'] = $save_cards;
        $user['favorite_book'] = $favorite_book;





        return response()->json([
            'status' => true,
            'data' => $user,
        ], 200);

    }



    public function update_user(request $request)
    {

        try{

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = $file->getClientOriginalName();
                $destinationPath = public_path() . 'profile/images';
                $request->photo->move(public_path('profile/image'), $fileName);
                $file_url = url('') . "/public/profile/image/$fileName";
            }

        User::where('id', Auth::id())->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $file_url,

        ]);



        return response()->json([

            'status' => true,
            'message' => "Profile updated successfully",

        ], 200);

    } catch (\Exception $th) {
        return $th->getMessage();
    }


    }


    public function saved_cards(request $request)
    {


        try {


            $save_cards = PayInfo::where('user_id', Auth::id())->select('customer_id', 'brand', 'last4', 'exp_month', 'exp_year', 'name')->get();

            return response()->json([

                'status' => true,
                'data' => $save_cards,

            ], 200);



        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }



    public function delete_card(request $request)
    {

        PayInfo::where('id', $request->card_id)->delete();
        return response()->json([

            'status' => true,
            'message' => "Card removed successfully",

        ], 200);


    }



    public function contact_us(Request $request)
    {

        $set = Setting::where('id', 1)->first();

        $body['phone_no'] = $set->phone_no;
        $body['email'] = $set->email;

        
            return response()->json([
                'status' => true,
                'data' => $body,
            ], 200);


    }



    public function delete_account(Request $request)
    {

        $usr = new OldUser();
        $usr->email = Auth::user()->email ?? null;
        $usr->save();
        $request->user()->token()->revoke();
        User::where('id', Auth::id())->delete();


        return response()->json([
            'status' => true,
            'message' => "Account has been successfully deleted",
        ], 200);



    }


    public function legal(Request $request)
    {

        $data['gdpr'] = url('')."/gdpr";
        $data['policy'] = url('')."/policy";
        $data['copyrite'] = url('')."/copyrite";


            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);


    }





    
}
