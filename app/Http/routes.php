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

	Route::get('/login', ['as' => 'login', function () {
    	return view('auth/login');
	}]);

	Route::get('/events/details/print/{id}', function ($id) {
    	if (Auth::check()) {
    		return view('print')->with('event', $id);
    	} else {
    		return redirect()->route('login');
    	}
	});

	Route::get('/events/details/print', function () {
    	return redirect()->action('EventController@index');
	});

	Route::get('/events/details/{id}', function ($id) {
    	if (Auth::check()) {
    		return view('details')->with('event', $id);
    	} else {	
    		return redirect()->route('login');
    	}
	});

	Route::get('/events/details', function () {
    	return redirect()->action('EventController@index');
	});

	
    Route::get('/dash', 'HomeController@index');

    Route::resource('events', 'EventController');
});

// route to show the login form
Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'LoginController@index'));
});