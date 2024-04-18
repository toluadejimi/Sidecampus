<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WebWelcomeController extends Controller
{
    public function delete_account_view(request $request){

        return view('delete-account');


    }


    public function delete_account(request $request){

        $email = $request->email;
        $ck = User::where('email', $request->email)->first() ?? null;
        if($ck == null){
            return back()->with('error', 'Account not found, Check your email and try again');
        }

        User::where('email', $request->email)->delete();
        return back()->with('message', 'Account information has been deleted successuflly');


    }
}
