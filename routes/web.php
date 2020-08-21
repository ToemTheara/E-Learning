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

#Route for Admin Page
// Route::get('/index','Admin\BookController@index');
// Route::post('/create','Admin\BookController@create');
// Route::get('/edit','Admin\BookController@edit');
// Route::get('/store','Admin\BookController@store');
Route::get('/index','Admin\BookController@index')->name('index');
Route::get('/create','Admin\BookController@create');
Route::post('/store','Admin\BookController@store');

