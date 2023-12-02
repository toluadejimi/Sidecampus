<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    
    public function index(){


        $data['books'] = Book::latest()->take('50')->get();
        $data['newrelease'] = Book::where('type', 'new_release')->latest()->take('50')->get();

    
        return view('welcome', $data);



    }




}
