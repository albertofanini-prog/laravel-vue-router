<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api')->group(function(){
    // //Aggiungere rotta index
    // Route::get('/posts', 'PostController@index');

    // //Aggiungere rotta show
    // Route::get('/posts/{post}', 'PostController@show');

    //Raggruppare le rotte
    Route::resource('posts', 'PostController')->only([
        'index','show'
    ]);
});