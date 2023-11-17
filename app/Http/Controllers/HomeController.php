<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\MyPlan;
use App\Models\slider;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{



    public function home(request $request){


       $data['slider'] = Slider::select('images', 'url')->get();
       $data['my_plan'] = MyPlan::select('status', 'subscribe_at', 'expires_at')->where('user_id', Auth::id())->get() ?? null;
       $data['latest'] = Book::latest()->select('id','title', 'images', 'audio')->take(10)->get() ?? null;
       $data['collection'] = Category::select('id','title')->get() ?? null;
       $data['popular'] = Book::select('id','title', 'author', 'description', 'images')->where('reads', '>', 10)->get() ?? null;
       $data['viewd'] = View::select('id','title', 'images')->where('user_id',Auth::id())->get() ?? null;








       return response()->json([

        'status' => true,
        'data' => $data

       ], 200);

    }









}
