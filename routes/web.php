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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'UsersController@profile');
Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function () {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('users', 'Admin\UsersController@overview');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::post('user/update', 'Admin\UsersController@edit');

    Route::get('templates', 'Admin\TemplatesController@overview');
    Route::get('template/create', 'Admin\TemplatesController@create');
    Route::post('template/create', 'Admin\TemplateController@store');
    Route::get('template/edit/{id}', 'Admin\TemplatesController@edit');
    Route::post('template/update', 'Admin\TemplateController@update');

    Route::group(['prefix' => 'colloquia'], function () {
        Route::get('/', 'ColloquiumController@index');
        Route::get('create', 'ColloquiumController@create');
        Route::get('edit/{id}', 'ColloquiumController@edit');
        Route::post('insert', 'ColloquiumController@insert');
        Route::post('update', 'ColloquiumController@update');
        Route::post('delete', 'ColloquiumController@delete');
    });
});

Route::group(['prefix' => 'planner/colloquia', 'middleware' => 'role:planner'], function () {
    Route::get('/', 'ColloquiumController@index');
    Route::get('edit/{id}', 'ColloquiumController@edit');
    Route::post('update', 'ColloquiumController@update');
});


Route::get('/mobile', function () {
    return view('mobile.index');
});
Route::get('/mobile/details', function () {
    return view('mobile.details');
});
