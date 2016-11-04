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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'UsersController@profile');
Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin'], function($route) {
    Route::get('user/edit/{id}', 'Admin\UserController@edit');
});

Auth::routes();
