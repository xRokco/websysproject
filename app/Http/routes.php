<?php
use App\events;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
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
    Route::get('create', 'EventController@create');
    Route::post('events','EventController@store');

    Route::get('/login', ['as' => 'login', function () {
        return view('auth/login');
    }]);

   
    Route::patch('/dash/{id}','HomeController@update');
    Route::get('/events/details/print', function () {
        return redirect()->action('EventController@index');
    });

    Route::get('/events/details/{id}','EventController@getEventDetails');

    Route::get('/events/details', function () {
        return redirect()->action('EventController@index');
    });

    Route::resource('events', 'EventController');

    Route::get('account', 'HomeController@editUserInfo');
    
    //This is the route to print your ticket
    Route::get('/events/details/print/{id}','EventController@printEventTicket');

    //This is the route to delete an event
    Route::get('/events/delete/{id}','EventController@deleteEvent');

    //This is the route for the rsvp page
    Route::get('dash', 'EventController@showUserEvents');

    // This is the route to attend an event
    Route::get('/events/details/attend/{id}','EventController@attendEvent');

    // This is the route to unattend an event 
    Route::get('/events/details/unattend/{id}','EventController@unattendEvent');

    Route::get('about', function () {
        return view('about');
    });

    Route::get('about', function () {
        return view('about');
    });
});

// route to show the login form
Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'LoginController@index'));
});