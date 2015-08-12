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
    Route::get('tasks/cancel/{id}', 'TasksController@cancel');

    Route::group(['middleware' => 'acl'], function () {

        Route::get('tasks/create_mine', ['as'=>'tasks-create-mine', 'uses'=>'TasksController@createMine']);
        Route::get('users/profile', ['as'=>'profile', 'UsersController@profile']);
        Route::get('permissions', 'PermissionsController@index');
        //Route::get('reports/index', 'ReportsController@index');
        Route::get('rooms/toggle/{id}', 'RoomsController@toggle');

        Route::post('beds/{id}/basic', ['as'=>'beds-update-basic', 'uses'=>'BedsController@updateBasic']);
        Route::post('distributions/{id}/basic', ['as'=>'distributions-update-basic', 'uses'=>'DistributionsController@updateBasic']);
        Route::post('reservations/{id}/reduce_debt', ['as'=>'reservations-reduce-debt', 'uses'=>'ReservationsController@reduceDebt']);

        Route::resource('beds', 'BedsController', [
                                                    'names' => ['index'   => 'beds-index',
                                                                'show'    => 'beds-show',
                                                                'edit'    => 'beds-edit',
                                                                'update'  => 'beds-update',
                                                                'create'  => 'beds-create',
                                                                'store'   => 'beds-store',
                                                                'destroy' => 'beds-destroy']
                                                    ]);

        Route::resource('distributions', 'DistributionsController', [
                                                                    'names' => ['index'   => 'distributions-index',
                                                                                'show'    => 'distributions-show',
                                                                                'edit'    => 'distributions-edit',
                                                                                'update'  => 'distributions-update',
                                                                                'create'  => 'distributions-create',
                                                                                'store'   => 'distributions-store',
                                                                                'destroy' => 'distributions-destroy']
                                                                    ]);

        Route::resource('rooms', 'RoomsController', [
                                                    'names' => ['index'   => 'rooms-index',
                                                                'show'    => 'rooms-show',
                                                                'edit'    => 'rooms-edit',
                                                                'update'  => 'rooms-update',
                                                                'create'  => 'rooms-create',
                                                                'store'   => 'rooms-store',
                                                                'destroy' => 'rooms-destroy']
                                                    ]);

        Route::resource('reservations', 'ReservationsController', [
                                                                    'names' => ['index'   => 'reservations-index',
                                                                                'show'    => 'reservations-show',
                                                                                'edit'    => 'reservations-edit',
                                                                                'update'  => 'reservations-update',
                                                                                'create'  => 'reservations-create',
                                                                                'store'   => 'reservations-store',
                                                                                'destroy' => 'reservations-destroy']
                                                                    ]);

        Route::resource('roles', 'RolesController');
        Route::resource('services', 'ServicesController');
        Route::resource('tasks', 'TasksController');
        Route::resource('users', 'UsersController');

        Route::group(array('prefix' => 'reports'), function() {
            Route::get('/', 'ReportsController@index');
        });

    });

    Route::group(array('prefix' => 'search'), function() {

        Route::get('beds', ['as' => 'search-remaining-beds', 'uses' => 'SearchController@getRemainingBedsByName']);
        Route::get('distributions', ['as' => 'search-remaining-distributions', 'uses' => 'SearchController@getRemainingDistributionsByName']);
        Route::get('distribution-by-room-id', ['as' => 'get-distribution-by-room-id', 'uses' => 'SearchController@getDistributionsByRoomId']);
        Route::get('rooms', ['as' => 'search-remaining-rooms', 'uses' => 'SearchController@getRemainingRoomsByName']);
        Route::get('rooms-free', ['as' => 'search-free-rooms', 'uses' => 'SearchController@getFreeRoomsByCheckInAndCheckOut']);
        Route::get('services', ['as' => 'search-remaining-services', 'uses' => 'SearchController@getRemainingServicesByName']);
        Route::get('user', ['as' => 'search-user', 'uses' => 'SearchController@getUserByName']);
        Route::get('users', ['as' => 'search-remaining-users', 'uses' => 'SearchController@getRemainingUsersByName']);

    });
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
