<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);


Route::group(['middleware'=>['auth']],function(){

Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{id}', 'PostController@show')->name('posts.show');
Route::post('/posts/store', 'PostController@store')->name('posts.store');
Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
Route::put('/posts/{id}/update', 'PostController@update')->name('posts.update');
Route::delete('/posts/{id}/destroy', 'PostController@destroy')->name('posts.destroy');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', 'PostController@index')->name('posts.index');


Route::get('itemPdfView',array('as'=>'itemPdfView','uses'=>'ItemController@itemPdfView'));


//Route::get('/sansemplois', 'HomController@emploi')->name('emplois');

Route::get('/sansemplois', [App\Http\Controllers\HomeController::class, 'emploie'])->name('sansemplois');