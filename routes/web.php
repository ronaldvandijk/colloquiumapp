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

// TV Screen
Route::get('/tv', function () {
    return view('tv');
});

Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function () {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('/profile', 'Admin\UsersController@profile');

    Route::get('users', 'Admin\UsersController@index');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::get('user/delete/{userId}', 'Admin\UsersController@delete');
    Route::post('user/update', 'Admin\UsersController@edit');

    Route::get('rooms', 'Admin\RoomController@index');
    Route::post('rooms', 'Admin\RoomController@store');
    Route::get('room/edit/{id}', 'Admin\RoomController@edit');
    Route::delete('room/destroy/{id}', 'Admin\RoomController@destroy');
    Route::post('room/update/{id}', 'Admin\RoomController@update');
    Route::get('room/create', 'Admin\RoomController@create');

    Route::resource('locations', 'Admin\LocationController');
    Route::resource('themes', 'Admin\ThemeController');

    Route::resource('cities', 'Admin\CityController');

    Route::resource('mailtemplates', 'Admin\MailtemplateController');

    Route::group(['prefix' => 'colloquia', 'middleware' => 'role:administrator|planner'], function () {
        Route::get('/', 'Admin\ColloquiumController@index');
        Route::get('/{status}', 'Admin\ColloquiumController@index');
        Route::get('edit/{colloquium}', 'Admin\ColloquiumController@edit');
        Route::post('insert', 'Admin\ColloquiumController@insert');
        Route::post('update/{colloquium}', 'Admin\ColloquiumController@update');
        Route::get('/approve/{colloquium}', 'Admin\ColloquiumController@approve');
        Route::get('/deny/{colloquium}', 'Admin\ColloquiumController@deny');
    });
});

Route::group(['prefix' => 'mycolloquia', 'middleware' => 'role:user'], function () {
    Route::get('/', 'MyColloquiaController@index');
    Route::get('/edit/{colloquium}', 'MyColloquiaController@edit');
    Route::post('/update/{colloquium}', 'MyColloquiaController@update');
    Route::get('/request', 'MyColloquiaController@create');
    Route::post('/store', 'MyColloquiaController@store');
});


Route::group(['prefix' => 'agenda'], function () {
    Route::get('/', 'AgendaController@index');
    Route::get('/show/{colloquium}', 'AgendaController@show');
});

Route::group(['prefix' => 'search'], function () {
    Route::post('/', 'SearchController@index');
});
