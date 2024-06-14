<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class CommentController extends Controller
{

//    public function store(Request $request, Post $post)
//    {
//        $request->validate([
//            'name'=>'required ',
//            'email' => 'required|email',
//            'comment' => 'required',
//        ]);
//
//        $post->comments()->create([
//            'name' => $request->input('name', 'Anonymous'),
//            'email' => $request->input('email'),
//            'comment' => $request->input('comment'),
//        ]);
//
//        return back();
//    }

    public function store( CommentRequest $request )
    {


        $comment= Comment::create([
             'post_id'=> $request->input('post_id'),
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'comment'           => $request->input('comment'),

        ]);

        return redirect()->back()->with('alert.success','successfully sent');
    }






}
