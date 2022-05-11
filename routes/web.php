<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//Funzione per raggruppare le rotte, applicare cose comuni
    //Middleware: autentica
    //Namespace: cartella in cui deve essere creato controller e collegata la route
    //Name: aggiunge prefisso a name su route:list
    //Prefix assegna un prefisso comune alle rotte
Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){

    Route::get('/home', 'HomeController@index')->name('home');

    //Resource posts
    //Ecc
    Route::resource('posts', 'PostController');
    
    // Route::delete('admin/posts/{post}/force', 'PostController@forceDestroy')->name('post.destroy.force');

});

// Route::get('home', 'HomeController@index')->name('home');

//creare rotta
    //tutto ciò che è intercettato viene passato alla rotta
    //e ritornato
    //where tutto il path dell'url
// Route::get('{any?}', function(){
//     // return $param;

//     //ritornare la vista
//     return view('guest.home');
// })->where('any','.*');

//function diretta per fallback
Route::fallback(function(){
    return view('guest.home');
});