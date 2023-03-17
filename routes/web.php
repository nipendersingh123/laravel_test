<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home', 'HomeController@index')->name('home');
Route::get('delete-auther/{id}', 'HomeController@deleteAuther')->name('delete.auther');
Route::get('view-auther/{id}', 'HomeController@viewAuther')->name('view.auther');
Route::get('delete-book/{id}', 'HomeController@deleteBook')->name('delete.book');
Route::get('add-book', 'HomeController@addBook')->name('add.book');
Route::post('add-newbook', 'HomeController@newbook')->name('add.newbook');


