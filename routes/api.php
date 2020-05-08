<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\PostCollection;
use App\Post;
use App\User;


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
   $Posts= Post::all();
   foreach ($Posts as &$Post) {
       $User = User::find($Post->user_id);
       // $Post += [ $User => $User];
       $Post['user'] = $User;
       $Post['comments'] = $Post->comments();
    }
   
   
    return new PostCollection($Posts);

});

Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->post();
});
 
Route::post('register','AuthController@register');
Route::post('login','AuthController@login');