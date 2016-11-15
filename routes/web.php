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

Route::get('/', 'AgendaController@index');

// TV Screen
Route::get('/tv/{location_id?}', 'HomeController@tv');

Route::group(['prefix' => 'admin', 'middleware' => 'role:administrator'], function () {
    Route::get('/', 'Admin\HomeController@index');

    Route::get('/profile', 'Admin\UsersController@profile');

    Route::get('users', 'Admin\UsersController@overview');
    Route::post('users', 'Admin\UsersController@store');
    Route::get('users/create', 'Admin\UsersController@create');
    Route::get('user/edit/{user}', 'Admin\UsersController@edit');
    Route::get('user/delete/{id}', 'Admin\UsersController@destroy');
    Route::patch('user/update/{user}', 'Admin\UsersController@update');

    Route::get('rooms', 'Admin\RoomController@index');
    Route::post('rooms', 'Admin\RoomController@store');
    Route::get('room/edit/{id}', 'Admin\RoomController@edit');
    Route::delete('room/destroy/{id}', 'Admin\RoomController@destroy');
    Route::post('room/update/{id}', 'Admin\RoomController@update');
    Route::get('room/create', 'Admin\RoomController@create');

    Route::resource('locations', 'Admin\LocationController');
    Route::resource('themes', 'Admin\ThemeController');
    Route::resource('buildings', 'Admin\BuildingController');

    Route::resource('cities', 'Admin\CityController');

    Route::resource('mailtemplates', 'Admin\MailtemplateController');
});

Route::group(['prefix' => 'planner', 'middleware' => 'role:administrator|planner'], function () {
    Route::group(['prefix' => 'colloquia'], function () {
        Route::get('/{status?}', 'Admin\ColloquiumController@index');
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

Route::group(['prefix' => 'mailtemplates', 'middleware' => 'role:planner|administrator'], function () {
    Route::get('/', 'MailTemplatesController@overview');
});

Route::group(['prefix' => 'search'], function () {
    Route::post('/', 'SearchController@index');
});

Route::group(['prefix' => 'profile', 'middleware' => 'role:user|planner|administrator'], function () {
    Route::get('/', 'ProfileController@index');
    Route::get('/settings', 'ProfileController@settings');
    Route::post('/settings', 'ProfileController@save');
    Route::get('/avatar', 'ProfileController@avatar');
});
