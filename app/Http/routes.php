<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::get('tasks/start/{id}', 'TasksController@start');
    Route::get('tasks/end/{id}', 'TasksController@end');

    Route::group(['middleware' => 'acl'], function () {
        Route::get('tasks/create_mine', 'TasksController@createMine');
        Route::resource('users','UsersController');
        Route::resource('roles','RolesController');
        Route::resource('reservations','ReservationsController');
        Route::resource('rooms','RoomsController');
        Route::resource('beds','BedsController');
        Route::resource('services','ServicesController');
        Route::resource('tasks','TasksController');
        Route::get('permissions', 'PermissionsController@index');
    });

    Route::group(array('prefix' => 'search'), function() {
        Route::get('user', array('as' => 'search-user', 'uses' => 'SearchController@getUserByName'));
        Route::get('users', array('as' => 'search-remaining-users', 'uses' => 'SearchController@getRemainingUsersByName'));
        Route::get('rooms', array('as' => 'search-remaining-rooms', 'uses' => 'SearchController@getRemainingRoomsByName'));
        Route::get('distributions', array('as' => 'search-remaining-distributions', 'uses' => 'SearchController@getRemainingDistributionsByName'));
        Route::get('services', array('as' => 'search-remaining-services', 'uses' => 'SearchController@getRemainingServicesByName'));
        Route::get('room-price-by-ids', array('as' => 'search-room-price-by-ids', 'uses' => 'SearchController@getRoomPriceByIds'));
    });
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
