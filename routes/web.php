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

Route::get('/home', 'HomeController@index');
Route::get('/test', 'TestController@overview');

Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function() {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('/profile', 'Admin\UsersController@profile');

    Route::get('users', 'Admin\UsersController@index');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::get('user/delete/{userId}', 'Admin\UsersController@delete');
    Route::post('user/update', 'Admin\UsersController@edit');

    Route::get('templates', 'Admin\TemplatesController@overview');
    Route::get('template/create', 'Admin\TemplatesController@create');
    Route::post('template/create', 'Admin\TemplateController@store');
    Route::get('template/edit/{id}', 'Admin\TemplatesController@edit');
    Route::post('template/update', 'Admin\TemplateController@update');

    Route::resource('themes', 'Admin\ThemeController');
});

Route::resource('/city', 'Admin\CityController');

Route::group(['prefix' => 'mycolloquia', 'middleware' => 'role:user'], function() {
    Route::get('/', 'MyColloquiaController@index');
    Route::get('/edit/{colloquium}', 'MyColloquiaController@edit');
    Route::post('/update/{colloquium}', 'MyColloquiaController@update');
});

Route::group(['prefix' => 'colloquium'], function() {
    Route::get('/', 'ColloquiumController@index');
    Route::get('create', 'ColloquiumController@create');
    Route::post('create', 'ColloquiumController@store');
});

Route::group(['prefix' => 'agenda', 'middleware' => 'role:planner|administrator'], function() {
    Route::get('/', 'SearchController@index');
    Route::get('/show/{colloquium}', 'SearchController@show');
});