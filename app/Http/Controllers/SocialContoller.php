<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\PostLike;
use App\Models\PostComment;
use App\Models\SubComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialContoller extends Controller
{

    public function all_post($batchNumber)
    {
        $perPage = 10;
        $offset = ($batchNumber - 1) * $perPage;
        $data['all_posts'] = Post::select('id', 'user_image', 'user_name', 'created_at', 'media', 'media_title', 'message', 'likes', 'comment')
            ->latest()
            ->offset($offset)
            ->limit($perPage)
            ->get();
        $data['total_count'] = Post::count();
        $data['index'] = $perPage;

        return response()->json([
            'status' => true,
            'posts' => $data,
        ], 200);
    }


    public function report_post(request $request)
    {

        Post::where('id', $request->id)
            ->update([
                'status' => 2,
                'reason' => $request->reason,
            ]);

        return response()->json([
            'status' => true,
            'message' => "Post Reported Successfully",
        ], 200);

    }


    public function my_post($batchNumber)
    {
        $perPage = 10;
        $offset = ($batchNumber - 1) * $perPage;
        $data['my_posts'] = Post::select('id', 'user_image', 'user_name', 'created_at', 'media', 'media_title', 'message', 'likes', 'comment')
            ->latest()
            ->where('user_id', Auth::id())
            ->offset($offset)
            ->limit($perPage)
            ->get();
        $data['total_count'] = Post::where('user_id', Auth::id())
            ->count();
        $data['index'] = $perPage;

        return response()->json([
            'status' => true,
            'posts' => $data,
        ], 200);
    }


    public function post(request $request)
    {


        if ($request->file != null) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . 'post/media';
            $request->file->move(public_path('post/media'), $fileName);
            $file_url = url('') . "/public/post/media/$fileName";


            $post = new Post();
            $post->user_id = Auth::id();
            $post->message = $request->message;
            $post->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
            $post->user_image = Auth::user()->image;
            $post->media_title = $request->media_title;
            $post->media = $file_url;
            $post->save();

            return response()->json([

                'status' => true,
                'message' => "Post successful",

            ], 200);

        }


        if ($request->message != null && $request->file == null) {


            $post = new Post();
            $post->user_id = Auth::id();
            $post->message = $request->message;
            $post->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
            $post->user_image = Auth::user()->image;
            $post->media_title = $request->media_title;
            $post->save();

            return response()->json([

                'status' => true,
                'message' => "Post successful",

            ], 200);


        }


        return response()->json([

            'status' => false,
            'message' => "Something Went Wrong",

        ], 500);


    }


    public function like(request $request)
    {


        Post::where('id', $request->post_id)->increment('likes', 1);
        return response()->json([

            'status' => true,
            'message' => "You liked the post",

        ], 200);
    }


    public function open_post(request $request)
    {


        $data['post'] = Post::select('id', 'user_image', 'user_name', 'created_at', 'media', 'media_title', 'message', 'likes', 'comment')->where('id', $request->post_id)->get();
        $data['comment'] = Comment::select('id', 'user_id', 'post_id', 'user_image', 'user_name', 'comment', 'created_at')->latest()->where('post_id', $request->post_id)->get();

        return response()->json([

            'status' => true,
            'data' => $data,

        ], 200);
    }


    public function open_comment(request $request)
    {


        $data['comment'] = Comment::select('id', 'user_image', 'user_name', 'created_at', 'comment', 'comment_count')
            ->where('id', $request->comment_id)->get();
        $data['sub_comment'] = SubComment::select('id', 'user_id', 'user_image', 'user_name', 'comment', 'created_at')->latest()->where('comment_id', $request->comment_id)->get();

        return response()->json([

            'status' => true,
            'data' => $data,

        ], 200);


    }


    public function unlike(request $request)
    {

        Post::where('id', $request->post_id)->decrement('likes', 1);
        return response()->json([

            'status' => true,
            'message' => "You unlike the post",

        ], 200);
    }


    public function delete_post(request $request)
    {

        Post::where('id', $request->post_id)->delete();
        return response()->json([

            'status' => true,
            'message' => "Post Deleted Successfully",

        ], 200);
    }


    public function comment(request $request)
    {

        $comm = new Comment();
        $comm->post_id = $request->post_id;
        $comm->user_id = Auth::id();
        $comm->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
        $comm->user_image = Auth::user()->image;
        $comm->comment = $request->comment;
        $comm->save();

        Post::where('id', $request->post_id)->increment('comment', 1);


        return response()->json([

            'status' => true,
            'message' => "Comment saved successfully",

        ], 200);
    }


    public function edit_comment(request $request)
    {

        Comment::where('id', $request->comment_id)->update(['comment' => $request->comment]);
        return response()->json([

            'status' => true,
            'message' => "Comment updated successfully",

        ], 200);
    }


    public function edit_post(request $request)
    {
        Post::where('id', $request->post_id)->update(['message' => $request->message]);
        return response()->json([

            'status' => true,
            'message' => "Post updated successfully",

        ], 200);
    }


    public function delete_comment(request $request)
    {

        Comment::where('id', $request->comment_id)->delete();
        Post::where('id', $request->post_id)->decrement('comment', 1);

        return response()->json([

            'status' => true,
            'message' => "Comment deleted successfully",

        ], 200);
    }


    public function post_sub_comment(request $request)
    {

        $comm = new SubComment();
        $comm->post_id = $request->post_id;
        $comm->comment_id = $request->comment_id;
        $comm->user_id = Auth::id();
        $comm->user_name = Auth::user()->first_name . " " . Auth::user()->last_name;
        $comm->user_image = Auth::user()->image;
        $comm->comment = $request->comment;
        $comm->save();

        Comment::where('id', $request->comment_id)->increment('comment_count', 1);


        return response()->json([

            'status' => true,
            'message' => "Comment posted successfully",

        ], 200);
    }

}
