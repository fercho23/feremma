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

    Route::get('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::get('tasks/start/{id}', 'TasksController@start');
    Route::get('tasks/end/{id}', 'TasksController@end');
    Route::get('tasks/cancel/{id}', 'TasksController@cancel');

    Route::group(['middleware' => 'acl'], function () {

        Route::get('tasks/create_mine', ['as'=>'tasks-create-mine', 'uses'=>'TasksController@createMine']);

        Route::get('users/profile', ['as'=>'profile', 'UsersController@profile']);

        Route::get('permissions', ['as'=>'permissions-index', 'uses'=>'PermissionsController@index']);

        Route::get('rooms/toggle/{id}', 'RoomsController@toggle');

        Route::post('beds/{id}/basic', ['as'=>'beds-update-basic', 'uses'=>'BedsController@updateBasic']);

        Route::post('distributions/{id}/basic', ['as'=>'distributions-update-basic', 'uses'=>'DistributionsController@updateBasic']);

        Route::group(array('prefix' => 'reservations'), function() {

            Route::post('{id}/reduce_debt', ['as'=>'reservations-reduce-debt', 'uses'=>'ReservationsController@reduceDebt']);
            Route::get('check_in', ['as'=>'reservations-index-check-in', 'uses'=>'ReservationsController@indexCheckIn']);
            Route::get('check_out', ['as'=>'reservations-index-check-out', 'uses'=>'ReservationsController@indexCheckOut']);
            Route::post('{id}/check_in', ['as'=>'reservations-check-in', 'uses'=>'ReservationsController@checkIn']);
            Route::post('{id}/check_out', ['as'=>'reservations-check-out', 'uses'=>'ReservationsController@checkOut']);

        });

        Route::post('reports/generate', ['as'=>'reports-generate', 'uses'=>'ReportsController@generate']);


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

        Route::resource('reports', 'ReportsController', [
                                                                    'names' => ['index'   => 'reports-index',
                                                                                'show'    => 'reports-show',
                                                                                'edit'    => 'reports-edit',
                                                                                'update'  => 'reports-update',
                                                                                'create'  => 'reports-create',
                                                                                'store'   => 'reports-store',
                                                                                'destroy' => 'reports-destroy']
                                                                    ]);

        Route::resource('roles', 'RolesController', [
                                                    'names' => ['index'   => 'roles-index',
                                                                'show'    => 'roles-show',
                                                                'edit'    => 'roles-edit',
                                                                'update'  => 'roles-update',
                                                                'create'  => 'roles-create',
                                                                'store'   => 'roles-store',
                                                                'destroy' => 'roles-destroy']
                                                    ]);

        Route::resource('services', 'ServicesController', [
                                                            'names' => ['index'   => 'services-index',
                                                                        'show'    => 'services-show',
                                                                        'edit'    => 'services-edit',
                                                                        'update'  => 'services-update',
                                                                        'create'  => 'services-create',
                                                                        'store'   => 'services-store',
                                                                        'destroy' => 'services-destroy']
                                                            ]);

        Route::resource('tasks', 'TasksController', [
                                                    'names' => ['index'   => 'tasks-index',
                                                                'show'    => 'tasks-show',
                                                                'edit'    => 'tasks-edit',
                                                                'update'  => 'tasks-update',
                                                                'create'  => 'tasks-create',
                                                                'store'   => 'tasks-store',
                                                                'destroy' => 'tasks-destroy']
                                                    ]);

        Route::resource('users', 'UsersController', [
                                                    'names' => ['index'   => 'users-index',
                                                                'show'    => 'users-show',
                                                                'edit'    => 'users-edit',
                                                                'update'  => 'users-update',
                                                                'create'  => 'users-create',
                                                                'store'   => 'users-store',
                                                                'destroy' => 'users-destroy']
                                                    ]);
    });

    Route::group(array('prefix' => 'search'), function() {

        Route::get('bed', ['as' => 'search-bed', 'uses' => 'SearchController@getBedByName']);
        Route::get('beds', ['as' => 'search-remaining-beds', 'uses' => 'SearchController@getRemainingBedsByName']);

        Route::group(array('prefix' => 'distribution'), function() {
            Route::get('/', ['as' => 'search-distribution', 'uses' => 'SearchController@getDistributionByName']);
            Route::get('/by-room-id', ['as' => 'get-distribution-by-room-id', 'uses' => 'SearchController@getDistributionsByRoomId']);
        });
        Route::get('distributions', ['as' => 'search-remaining-distributions', 'uses' => 'SearchController@getRemainingDistributionsByName']);

        Route::get('role', ['as' => 'search-role', 'uses' => 'SearchController@getRoleByName']);

        Route::get('room', ['as' => 'search-room', 'uses' => 'SearchController@getRoomByName']);
        Route::group(array('prefix' => 'rooms'), function() {
            Route::get('/', ['as' => 'search-remaining-rooms', 'uses' => 'SearchController@getRemainingRoomsByName']);
            Route::get('free', ['as' => 'search-free-rooms', 'uses' => 'SearchController@getFreeRoomsByCheckInAndCheckOut']);
        });

        Route::get('service', ['as' => 'search-service', 'uses' => 'SearchController@getServiceByName']);
        Route::get('services', ['as' => 'search-remaining-services', 'uses' => 'SearchController@getRemainingServicesByName']);

        Route::get('user', ['as' => 'search-user', 'uses' => 'SearchController@getUserByNameOrSurnameOrDni']);
        Route::get('users', ['as' => 'search-remaining-users', 'uses' => 'SearchController@getRemainingUsersByNameOrSurnameOrDni']);

    });
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
