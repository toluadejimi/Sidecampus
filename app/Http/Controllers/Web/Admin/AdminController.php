<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Book;
use App\Models\User;
use App\Models\MyPlan;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

        $data['books'] = Book::count();
        $data['user'] = User::count();
        $data['transaction'] = Transaction::where('type', 2)->sum('amount');
        $data['categories'] = Category::count();
        $data['users'] = User::all();
        $data['subs'] = MyPlan::all();
        return view('admin.admindashboard', $data);
    }



    public function booklist(){

        $data['books'] = Book::all();
        return view('admin.book-list', $data);



    }

}



