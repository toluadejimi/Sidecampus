<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\MyPlan;
use App\Models\slider;
use App\Models\Review;
use App\Models\Community;
use App\Models\Favorite;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Mostafaznv\PdfOptimizer\Laravel\Facade\PdfOptimizer;
use Mostafaznv\PdfOptimizer\Enums\ColorConversionStrategy;
use Mostafaznv\PdfOptimizer\Enums\PdfSettings;


class HomeController extends Controller
{



    public function home(request $request)
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


        $data['slider'] = Slider::select('images', 'url')->get();
        $data['my_plan'] = MyPlan::select('status', 'subscribe_at', 'days_remaining', 'expires_at')->where('user_id', Auth::id())->get() ?? null;
        $data['latest'] = Book::latest()->select('id', 'title', 'images', 'audio')->take(10)->get() ?? null;
        $data['collection'] = Category::select('id', 'title')->get() ?? null;
        $data['popular'] = Book::select('id', 'title', 'author', 'description', 'images')->where('reads', '>', 10)->get() ?? null;
        $data['viewd'] = View::select('id', 'title', 'images')->where('user_id', Auth::id())->get() ?? null;





        return response()->json([

            'status' => true,
            'data' => $data

        ], 200);
    }



    public function view_book(request $request)
    {


        $data['book'] = Book::select('id', 'title', 'author', 'description', 'pdf', 'images', 'audio', 'reads', 'rating')->where('id', $request->book_id)->get();
        $data['review'] = Review::select('user_profile_pics', 'comment', 'rating', 'user_name', 'created_at')->where('book_id', $request->book_id)->get();

        $author = Book::where('id', $request->book_id)->first()->author ?? null;
        $data['similar_by_author'] = Book::select('title', 'images')->where('author', $author)->get();
        Book::where('id', $request->book_id)->increment('views', 1);

        $book_image = Book::where('id', $request->book_id)->first()->images ?? null;
        $title = Book::where('id', $request->book_id)->first()->title ?? null;

        $ckv = View::where('book_id', $request->book_id)->first() ?? null;
        if ($ckv == null) {
            $v = new View();
            $v->user_id = Auth::id();
            $v->book_id = $request->book_id;
            $v->images = $book_image;
            $v->title = $title;
            $v->save();
        }


        $data['viewd'] = View::select('id', 'title', 'images')->where('user_id', Auth::id())->get() ?? null;








        return response()->json([

            'status' => true,
            'data' => $data

        ], 200);
    }



    public function read_book(request $request)
    {


        $ck = MyPlan::where('user_id', Auth::id())->first()->status ?? null;

        if ($ck == 0 || $ck == null) {
            return response()->json([
                'status' => true,
                'message' => "Sorry you do not have an active plan, Subscribe to a plan to read a book"
            ], 422);
        }



        $data['book'] = Book::select('pdf')->where('id', $request->book_id)->get();
        Book::where('id', $request->book_id)->increment('reads', 1);

        return response()->json([

            'status' => true,
            'data' => $data

        ], 200);
    }




    public function add_favorite(request $request)
    {

        $book = Book::where('id', $request->book_id)->first();
        $fav =  new Favorite();
        $fav->book_id = $request->book_id;
        $fav->book_image = $book->images;
        $fav->title = $book->title;
        $fav->dexcription = $book->description;
        $fav->author = $book->author;
        $fav->user_id = Auth::id();
        $fav->save();


        return response()->json([

            'status' => true,
            'message' => "Successfully added to favorite"

        ], 200);
    }



    public function add_review(request $request)
    {


        $rev = new Review();
        $rev->user_id = Auth::id();
        $rev->book_id = $request->book_id;
        $rev->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
        $rev->user_profile_pics = Auth::user()->image;
        $rev->comment = $request->comment;
        $rev->rating = $request->rating;
        $rev->save();

        Book::where('id', $request->book_id)->update([
            'rating' => $request->rating
        ]);


        return response()->json([

            'status' => true,
            'message' => "Review Successfully Added"

        ], 200);
    }



    public function edit_review(request $request)
    {


        Review::where('id', $request->review_id)->update([
            'comment', $request->comment,
            'rating', $request->rating,

        ]);

        return response()->json([

            'status' => true,
            'message' => "Review updated successfully"

        ], 200);
    }


    public function play_audio(request $request)
    {
        $audio = Book::select('audio', 'audio_duration', 'images')->where('id', $request->book_id)->get() ?? null;
        Book::where('id', $request->book_id)->increment('plays', 1);

        return response()->json([

            'status' => true,
            'data' => $audio

        ], 200);
    }


    public function share_to_community(request $request)
    {

        $book = Book::where('id', $request->book_id)->first();

        $com = new Community();
        $com->user_id = Auth::id();
        $com->com_comment = $request->comment;
        $com->book_id = $request->book_id;
        $com->com_image = $book->images;
        $com->com_title = $book->title;
        $com->com_author = $book->author;
        $com->save();


        return response()->json([

            'status' => true,
            'message' => "Post shared on community Successfully"

        ], 200);
    }


    public function search(request $request)
    {
        $keyword = $request->keyword;
        $results = Book::where('title', 'LIKE', "%$keyword%")->get();

        return response()->json([

            'status' => true,
            'data' => $results

        ], 200);
    }



    public function get_all_books(request $request)
    {

        $books = Book::select('title', 'category', 'author', 'audio', 'images', 'rating')->get();
        return response()->json([

            'status' => true,
            'data' => $books

        ], 200);
    }


    public function get_by_category(request $request)
    {


        if ($request->category == 'ALL') {

            $books = Book::select('id', 'title', 'author', 'category', 'audio', 'images', 'rating')->take(300)->get();
            return response()->json([
                'status' => true,
                'data' => $books
            ], 200);
        } else {

            $books = Book::select('id', 'title', 'author', 'category', 'audio', 'images', 'rating')->where('category', $request->category)->get();
            return response()->json([
                'status' => true,
                'data' => $books
            ], 200);
        }
    }



    public function get_by_audio(request $request)
    {
        $books = Book::select('title', 'author', 'category', 'audio', 'images', 'rating')->where('audio', '!=', null)->get();
        return response()->json([
            'status' => true,
            'data' => $books
        ], 200);
    }
}
