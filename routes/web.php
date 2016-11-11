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

<<<<<<< HEAD
Route::group(['prefix' => 'planner', 'middleware' => 'role:planner'], function() {
    Route::get('colloquia', 'Planner\ColloquiumController@index');
    Route::get('colloquia/edit/{colloquium}', 'Planner\ColloquiumController@update');
    Route::get('colloquia/{approved}', 'Planner\ColloquiumController@index');
    Route::get('colloquium/{colloquium}/{approved}', 'Planner\ColloquiumController@approve');
=======
    Route::group(['prefix' => 'colloquia'], function () {
        Route::get('/', 'ColloquiumController@index');
        Route::get('create', 'ColloquiumController@create');
        Route::get('edit/{id}', 'ColloquiumController@edit');
        Route::post('insert', 'ColloquiumController@insert');
        Route::post('update', 'ColloquiumController@update');
        Route::post('delete', 'ColloquiumController@delete');
    });
>>>>>>> 8432a892399a52d002921b6007b77a37402f7323
});

Route::group(['prefix' => 'planner/colloquia', 'middleware' => 'role:planner'], function () {
    Route::get('/', 'ColloquiumController@index');
    Route::get('edit/{id}', 'ColloquiumController@edit');
    Route::post('update', 'ColloquiumController@update');
});

Route::group(['prefix' => 'mobile'], function() {
    Route::get('/', 'SearchController@index');
    Route::get('/details', 'SearchController@details');
});