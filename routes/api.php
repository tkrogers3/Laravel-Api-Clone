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



////////////////////// Post Route to Post Collection 
Route::get('/posts',function () {
   $Posts= Post::with(['comments', 'user', 'comments.user'])->get();
   
    return new PostCollection($Posts);

});
Route::get('/posts/{post}',function ($id) {
    $Posts= Post::with(['comments', 'user', 'comments.user'])->get();
    
     return new PostCollection($Posts);
 
 });



Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->post();
});
 
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/logout', 'AuthController@logout');
    Route::post('/post','PostController@store');
});

//Post Routes

Route::post('register','AuthController@register');
Route::post('login','AuthController@login');