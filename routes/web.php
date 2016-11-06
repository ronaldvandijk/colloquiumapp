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
    Route::get('/', 'Admin\HomeController@index');

    Route::get('users', 'Admin\UsersController@overview');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::post('user/update', 'Admin\UsersController@edit');

    Route::get('templates', 'Admin\TemplatesController@overview');
    Route::get('template/create', 'Admin\TemplatesController@create');
    Route::post('tempalte/create', 'Admin\TemplateController@store');
    Route::get('template/edit/{id}', 'Admin\TemplatesController@edit');
    Route::post('template/update', 'Admin\TemplateController@update');

    Route::get('colloqiua', 'Admin\ColloquiaController@overview');
    Route::get('colloqiua/create', 'Admin\ColloquiaController@create');
    Route::post('colloqiua/create', 'Admin\ColloquiaController@store');
    Route::get('colloqiua/edit/{id}', 'Admin\ColloquiaController@edit');
    Route::post('colloqiua/update', 'Admin\ColloquiaController@update');

//    Route::get('colloqiua', 'Admin\ColloquiaController@overview');
//    Route::get('colloqiua/create', 'Admin\ColloquiaController@create');
//    Route::post('colloqiua/create', 'Admin\ColloquiaController@store');
//    Route::get('colloqiua/edit/{id}', 'Admin\ColloquiaController@edit');
//    Route::post('colloqiua/update', 'Admin\ColloquiaController@update');
});

Auth::routes();
