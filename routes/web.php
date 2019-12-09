<?php

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

Route::get('/', 'HomeController@index');

Route::get('signin', 'SigninController@form')->name('signin.form'); 
Route::post('attempt', 'SigninController@attempt')->name('signin.attempt');
Auth::routes();

Route::resource('/users', 'UsersController');
Route::resource('/items', 'ItemsController');
Route::resource('/transactions', 'TransactionsController');

