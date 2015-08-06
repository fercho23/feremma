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
        Route::get('permissions', 'PermissionsController@index');

        Route::resource('beds','BedsController');
        Route::resource('distributions','DistributionsController');
        Route::resource('reservations','ReservationsController');
        Route::resource('roles','RolesController');
        Route::resource('rooms','RoomsController');
        Route::resource('services','ServicesController');
        Route::resource('tasks','TasksController');
        Route::resource('users','UsersController');

    });

    Route::group(array('prefix' => 'search'), function() {

        Route::get('beds', array('as' => 'search-remaining-beds', 'uses' => 'SearchController@getRemainingBedsByName'));
        Route::get('distributions', array('as' => 'search-remaining-distributions', 'uses' => 'SearchController@getRemainingDistributionsByName'));
        Route::get('distribution', array('as' => 'get-distribution-by-id', 'uses' => 'SearchController@getDistributionById'));
        Route::get('distribution-by-room-id', array('as' => 'get-distribution-by-room-id', 'uses' => 'SearchController@getDistributionsByRoomId'));
        Route::get('rooms', array('as' => 'search-remaining-rooms', 'uses' => 'SearchController@getRemainingRoomsByName'));
        Route::get('services', array('as' => 'search-remaining-services', 'uses' => 'SearchController@getRemainingServicesByName'));
        Route::get('user', array('as' => 'search-user', 'uses' => 'SearchController@getUserByName'));
        Route::get('users', array('as' => 'search-remaining-users', 'uses' => 'SearchController@getRemainingUsersByName'));

    });
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
