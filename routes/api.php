<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use APP\Http\Resources\User as UserResource;
use APP\Http\Resources\UserCollection;
Use App\User;

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

Route::get('/users',function () {
    return new UserCollection(User::all());
});


Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->post();
});
 