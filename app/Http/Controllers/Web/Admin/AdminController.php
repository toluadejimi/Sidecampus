<?php

namespace App\Http\Controllers\Web\Admin;

use getID3 as ID3;
use App\Models\Book;
use App\Models\Plan;
use App\Models\User;
use App\Models\Author;
use App\Models\MyPlan;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    public function index()
    {

        $data['books'] = Book::count();
        $data['user'] = User::count();
        $data['transaction'] = Transaction::where('type', 2)->sum('amount');
        $data['categories'] = Category::count();
        $data['users'] = User::all();
        $data['subs'] = MyPlan::all();
        return view('admin.admindashboard', $data);
    }



    public function booklist()
    {

        $data['books'] = Book::all();
        return view('admin.book-list', $data);
    }


    public function new_book_view()
    {
        $data['category'] = Category::all();
        $data['author'] = Author::all();
        return view('admin.add-new-book', $data);
    }


    public function new_category_view()
    {
        return view('admin.add-new-category');
    }





    public function add_new_book(request $request)
    {

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/browse-books';
            $request->images->move(public_path('assets/images/browse-books'), $fileName);
            $images = url('') . "/public/assets/images/browse-books/$fileName";
        }


        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/book';
            $request->pdf->move(public_path('assets/images/book'), $fileName);
            $pdf = url('') . "/public/assets/images/book/$fileName";
        }


        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/audio';
            $request->audio->move(public_path('assets/images/audio'), $fileName);
            $audio = url('') . "/public/assets/images/audio/$fileName";
        }

        $bok = new Book();
        $bok->title = $request->title;
        $bok->description = $request->description;
        $bok->author = $request->author;
        $bok->category = $request->category;
        $bok->pdf = $pdf ?? null;
        $bok->audio = $audio ?? null;
        $bok->images = $images ?? null;
        $bok->save();


        return redirect('book-list')->with('message', "Book Saved Successfully");
    }



    public function delete_book(request $request)
    {

        Book::where('id', $request->id)->delete();

        return redirect('book-list')->with('error', "Book deleted successfully");
    }


    public function edit_book_view(request $request)
    {
        $data['book'] = Book::where('id', $request->id)->first();
        $data['category'] = Category::all();
        $data['author'] = Author::all();

        return view('admin.edit-book-view', $data);
    }


    public function edit_book(request $request)
    {


        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/browse-books';
            $request->images->move(public_path('assets/images/browse-books'), $fileName);
            $images = url('') . "/public/assets/images/browse-books/$fileName";
        }


        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/book';
            $request->pdf->move(public_path('assets/images/book'), $fileName);
            $pdf = url('') . "/public/assets/images/book/$fileName";
        }


        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/audio';
            $request->audio->move(public_path('assets/images/audio'), $fileName);
            $audio = url('') . "/public/assets/images/audio/$fileName";
        }


        if ($request->hasFile('audio')) {


            if ($file->isValid() && $file->getClientOriginalExtension() === 'mp3') {
                $getID3 = new ID3\GetID3();
                $fileInfo = $getID3->analyze($file->getPathname());

                if (isset($fileInfo['playtime_seconds'])) {
                    $duration = $fileInfo['playtime_seconds'];
                    return "The duration of the audio file is {$duration} seconds.";
                }
            }

            return "Unable to retrieve audio duration.";



            $record = Book::find($request->id);
            if ($record) {
                $record->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'author' => $request->author,
                    'category' => $request->category,
                    'audio' => $audio,
                ]);
            }
            return redirect('book-list')->with('message', "Books Updated Successfully");

        }


        if ($request->hasFile('images')) {


            $record = Book::find($request->id);
            if ($record) {
                $record->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'author' => $request->author,
                    'category' => $request->category,
                    'images' => $images
                ]);
            }
            return redirect('book-list')->with('message', "Books Updated Successfully");

        }


        if ($request->hasFile('pdf')) {


            $record = Book::find($request->id);
            if ($record) {
                $record->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'author' => $request->author,
                    'category' => $request->category,
                    'pdf' => $pdf,
                ]);
            }
            return redirect('book-list')->with('message', "Books Updated Successfully");

        }


        if ($request->hasFile('pdf') && $request->hasFile('images') && $request->hasFile('audio') ) {


            $record = Book::find($request->id);
            if ($record) {
                $record->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'author' => $request->author,
                    'category' => $request->category,
                    'pdf' => $pdf,
                    'audio' => $audio,
                    'images' => $images
                ]);
            }
            return redirect('book-list')->with('message', "Books Updated Successfully");

        }


        $record = Book::find($request->id);
        if ($record) {
            $record->update([
                'title' => $request->title,
                'description' => $request->description,
                'author' => $request->author,
                'category' => $request->category,
            ]);
        }
        return redirect('book-list')->with('message', "Books Updated Successfully");
    }







    public function new_author_view()
    {
        return view('admin.add-new-author');
    }


    public function author_list()
    {
        $data['author'] = Author::all();
        return view('admin.author-list', $data);
    }


    public function add_new_author(request $request)
    {

        $aut = new Author();
        $aut->title = $request->title;
        $aut->save();

        return redirect('author')->with('message', "Author Saved Successfully");
    }

    public function edit_author_view(request $request)
    {

        $data['author'] = Author::where('id', $request->id)->first();

        return view('admin.edit-author-view', $data);
    }


    public function delete_author(request $request)
    {

        Author::where('id', $request->id)->delete();

        return redirect('author')->with('error', "Author deleted successfully");
    }

    public function edit_author(request $request)
    {
        $record = Author::find($request->id);

        if ($record) {
            $record->update([
                'title' => $request->title,
            ]);
        }
        return redirect('author')->with('message', "Author Updated Successfully");
    }





    public function categories_list()
    {
        $data['categories'] = Category::all();
        return view('admin.category-list', $data);
    }


    public function add_new_category(request $request)
    {

        $cat = new Category();
        $cat->title = $request->title;
        $cat->save();

        return redirect('category')->with('message', "Category Saved Successfully");
    }

    public function edit_category_view(request $request)
    {

        $data['category'] = Category::where('id', $request->id)->first();

        return view('admin.edit-category-view', $data);
    }


    public function delete_category(request $request)
    {

        Category::where('id', $request->id)->delete();

        return redirect('category')->with('error', "Category deleted successfully");
    }

    public function edit_category(request $request)
    {
        $record = Category::find($request->id);

        if ($record) {
            $record->update([
                'title' => $request->title,
            ]);
        }
        return redirect('category')->with('message', "Category Updated Successfully");
    }



    public function user_list()
    {
        $data['user'] = User::all();
        return view('admin.user-list', $data);
    }


    public function add_new_user(request $request)
    {

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/browse-books';
            $request->images->move(public_path('assets/images/browse-books'), $fileName);
            $images = url('') . "/public/assets/images/browse-books/$fileName";
        }


        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/book';
            $request->pdf->move(public_path('assets/images/book'), $fileName);
            $pdf = url('') . "/public/assets/images/book/$fileName";
        }


        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'assets/images/audio';
            $request->audio->move(public_path('assets/images/audio'), $fileName);
            $audio = url('') . "/public/assets/images/audio/$fileName";
        }

        $bok = new Book();
        $bok->title = $request->title;
        $bok->description = $request->description;
        $bok->author = $request->author;
        $bok->category = $request->category;
        $bok->pdf = $pdf;
        $bok->audio = $audio;
        $bok->images = $images;
        $bok->save();


        return redirect('book-list')->with('message', "Book Saved Successfully");
    }



    public function setting(){

        $data['setting'] = Setting::where('id', 1)->first();
        $data['plan'] = Plan::where('id', 1)->first();

        return view('admin.setting', $data);
    }


    public function update_setting(request $request){

        Setting::where('id', 1)->update([
            'email' => $request->email,
            'phone_no' => $request->phone_no,
        ]);

        return back()->with('message', "Setting Updated Successfully");
    }

    public function update_plan(request $request){

        Plan::where('id', 1)->update([
            'amount' => $request->amount,
            'title' => $request->title,
        ]);

        return back()->with('message', "Plan Updated Successfully");
    }



    public function update_payment(request $request){

        Setting::where('id', 1)->update([
            'stripe_s' => $request->stripe_s,
            'stripe_p' => $request->stripe_p,
            'paypal_clinet' => $request->paypal_clinet,
            'paypal_s' => $request->paypal_s,
        ]);

        return back()->with('message', "Payment Updated Successfully");
    }









}
