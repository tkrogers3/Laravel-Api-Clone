<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $post = new Post();
        $post->user_id = $request->input('user_id');
        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->save();
        $posts= Post::with(['comments', 'user', 'comments.user'])->latest()->get();
         $response=["posts"=>$posts, "newPost"=>$post];
        return response($response, 200);
        dd($post);
        }
  
    /** 
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    // public function deletePost(Post $post, $id)
    // {
    //     //delete post - id, title,body, 
    //     //comments - id,title,body, post id
    //  $post= Post::where('post.id', $request->input('post.id');
    //     $post->delete();
    //   return response($response, 204);
        
    }
}
