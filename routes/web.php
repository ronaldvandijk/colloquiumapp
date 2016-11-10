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

Route::get('/profile', 'Admin\UsersController@profile');
Route::get('/home', 'HomeController@index');
Route::get('/test', 'TestController@overview');

Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function() {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('users', 'Admin\UsersController@overview');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::post('user/update', 'Admin\UsersController@edit');

//    Route::get('{type}', 'Admin\BaseController@overview');
//    Route::get('{type}/create', 'Admin\BaseController@create');
//    Route::post('{type}/store', 'Admin\BaseController@store');
//    Route::get('{type}/edit/{id}', 'Admin\BaseController@update');

    Route::get('templates', 'Admin\TemplatesController@overview');
    Route::get('template/create', 'Admin\TemplatesController@create');
    Route::post('template/create', 'Admin\TemplateController@store');
    Route::get('template/edit/{id}', 'Admin\TemplatesController@edit');
    Route::post('template/update', 'Admin\TemplateController@update');

    Route::resource('themes', 'Admin\ThemeController');
    Route::resource('building', 'Admin\BuildingController');
});

Route::resource('/city', 'Admin\CityController');

Route::group(['prefix' => 'colloquium'], function () {
    Route::get('/', 'ColloquiumController@index');
    Route::get('create', 'ColloquiumController@create');
    Route::post('create', 'ColloquiumController@store');
});

Route::group(['prefix' => 'agenda'], function() {
    Route::get('/', 'SearchController@index');
    Route::get('/details/{id}', 'SearchController@details');
});