<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use App\Models\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialContoller extends Controller
{

    public function all_post(){
        $data['all_post'] = Post::select('id', 'user_image', 'user_name', 'created_at', 'media', 'media_title', 'message', 'likes', 'comment')->latest()->pick('50')->get();
        $data['comments'] = PostComment::select('id', 'user_id', 'post_id', 'user_name', 'comment', 'created_at')->get();

        return response()->json([

            'status' => true,
            'posts' => $data,

        ], 200);

    }


    public function my_post(request $request){

        $data['my_posts'] = Post::select('id', 'user_image', 'user_name', 'created_at', 'media', 'media_title', 'message', 'likes', 'comment')->latest()->where('user_id', Auth::id())->pick('50');
        return response()->json([
            'status' => true,
            'posts' => $data,
        ], 200);

    }


    public function post(request $request){

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'post/media';
            $request->photo->move(public_path('post/media'), $fileName);
            $file_url = url('') . "/public/post/media/$fileName";
        }


        $post = new Post();
        $post->user_id = Auth::id();
        $post->message = $request->message;
        $post->user_name = Auth::user()->first_name." ".Auth::user()->last_name;
        $post->user_image = Auth::user()->image;
        $post->media_title = $request->media_title;
        $post->media = $file_url;
        $post->save();

        return response()->json([

            'status' => true,
            'message' => "Post successful",

        ], 200);

    }


    public function like(request $request){


        Post::where('id', $request->post_id)->increment('likes', 1);
        return response()->json([

            'status' => true,
            'message' => "You liked the post",

        ], 200);


    }


    public function unlike(request $request){

        Post::where('id', $request->post_id)->decrement('likes', 1);
        return response()->json([

            'status' => true,
            'message' => "You unlike the post",

        ], 200);

    }


    public function comment(request $request){



        Post::where('id', $request->post_id)->update('likes', 1);
        return response()->json([

            'status' => true,
            'message' => "You unlike the post",

        ], 200);

    }






}
