<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', function () {
    	return view('welcome');
	});

	Route::get('/dash/print', function () {
    	return view('print');
	});
	Route::get('/events', function () {
    	return view('events');
	});
	

    Route::get('/dash', 'HomeController@index');
});

// route to show the login form
Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'LoginController@index'));
});