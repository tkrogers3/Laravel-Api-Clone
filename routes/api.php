<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostCollection;
use App\Post;
use App\User;
use App\Comment;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user',function () {
    return UserResource::collection(User::all());
});

Route::get('/posts',function () {
   $Posts= Post::with(['comments', 'user', 'comments.user'])->get();
   
    return new PostCollection($Posts);

});

// Route::get('/comments',function () {
//     $Comments= Comment::all();
//     foreach ($Comments as $Comment) {
//         $Post = Post::find($Comment->post_id);
//         // $Comment += [ $Post=> $Post];
//         $Comment['post'] = $Post;
//         $Comment['comments'] = $Post->comments();
//      }
    
    
//      return new CommentCollection($Comments);
 
//  });

Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->post();
});
 
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/logout', 'AuthController@logout');
});

Route::post('register','AuthController@register');
Route::post('login','AuthController@login');


