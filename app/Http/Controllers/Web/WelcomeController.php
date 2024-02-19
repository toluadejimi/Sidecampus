<?php

namespace App\Http\Controllers\Web;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Plan;
use App\Models\User;
use App\Models\MyPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{

    public function index(){


        $data['books'] = Book::latest()->take('50')->get();
        $data['newrelease'] = Book::where('type', 'new_release')->latest()->take('50')->get();


        return view('welcome', $data);



    }


    public function privacy(){

        return view('privacy');

    }



    public function profile(request $request){


        $data['user'] = User::where('id', Auth::id())->first();
        return view('profile', $data);

    }


    public function update_profile(request $request){



        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/browse-books';
            $request->images->move(public_path('assets/images/browse-books'), $fileName);
            $images = url('') . "/public/assets/images/browse-books/$fileName";
        }


        if ($request->hasFile('images')) {


            $record = User::find($request->id);
            if ($record) {
                $record->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'image' => $images,

                ]);
            }

            return back()->with('message', "Profile Updated Successfully");

        }else{


            $record = User::find($request->id);
            if ($record) {
                $record->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,

                ]);
            }

            return back()->with('message', "Profile Updated Successfully");


        }


    }

    public function plan(request $request){


        $currentDate = Carbon::now();
        $data['current_date'] = $currentDate->daysInMonth;
    
        $data['plan'] = MyPlan::where('user_id', Auth::id())->first() ?? null;
        $data['cost'] = Plan::where('id', 1)->first() ?? null;



        if($data['plan'] == null){
            $data['ck'] = 0;
        }else{
            $data['ck'] = 1;
        }

        $data['paypal'] =  paypal_pay();
        $data['stripe'] =  stripe_pay();


        if($data['plan']->days_remaining == 0){
            $data['days'] = $data['current_date'];
        }



            //dd($data['plan']);



        return view('plan', $data);



    }



    public function read(request $request){


        $data['data'] = Book::where('id', $request->book_id)->first() ?? null;
        $data['book_pdf'] = Book::where('id', $request->book_id)->first()->pdf ?? null;


        $ck = check_plan();

        if($ck == false){
            return back()->with('error', "You do not have an active subscription");
        }


        return view('read', $data);


    }








}
