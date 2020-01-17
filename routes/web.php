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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    // Administrator Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'App\Http\Middleware\AdministratorMiddleware'], function () {
        Route::get('/', function () {
            return view('administrators.index');
        });
        Route::get('/kkk', function () {
            return view('administrators.index');
        });
    });

    // Manager Routes
    Route::group(['prefix' => 'manager', 'middleware' => 'App\Http\Middleware\ManagerMiddleware'], function () {
        Route::get('/', function () {
            return view('managers.index');
        });
    });

    // Member Routes
    Route::group(['prefix' => 'member', 'middleware' => 'App\Http\Middleware\MemberMiddleware'], function () {
        Route::get('/', function () {
            return view('members.index');
        });
    });
});