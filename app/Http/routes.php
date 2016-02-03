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

    //Route to return homepage
    Route::get('/', function () {
        return view('welcome');
    });

    //Route to return the create event page
    Route::get('create', 'EventController@create');

    //Route to return the admin page
    Route::get('admin', 'HomeController@index');


    //Route to be called when submit on create events page is clicked
    Route::post('events','EventController@store');

    //Route to return login page
    Route::get('/login', ['as' => 'login', function () {
        return view('auth/login');
    }]);
   
    Route::patch('/dash/{id}','HomeController@update');

    //Route to redirect to events page if user navigates to print page without an event ID
    Route::get('/events/details/print', function () {
        return redirect('events');
    });

    //Route to return the event details page
    Route::get('/events/details/{id}','EventController@getEventDetails');

    //Route to redirect to events page if user navigates to the deatails page without an event ID
    Route::get('/events/details', function () {
        return redirect('events');
    });

    //Route to return EventController@index and return the event page view
    Route::resource('events', 'EventController');

    //Route to return the edit user info page.
    Route::get('account', 'HomeController@editUserInfo');

     //Route to return the edit event info page.
    Route::get('admin/edit/{id}', 'EventController@editEventInfo');
    
    //This is the route to print your ticket
    Route::get('/events/details/print/{id}','EventController@printEventTicket');

    //This is the route to delete an event
    Route::get('admin/delete/{id}','EventController@deleteEvent');

    //This is the route for the rsvp page
    Route::get('dash', 'EventController@showUserEvents');

    // This is the route to attend an event
    Route::get('/events/details/attend/{id}','EventController@attendEvent');

    // This is the route to unattend an event 
    Route::get('/events/details/unattend/{id}','EventController@unattendEvent');

    Route::get('/admin/attendees/{id}','EventController@getAttendees');

    //Route to return the about our team page
    Route::get('about', function () {
        return view('about');
    });
});

// route to show the login form
//Route::group(array('namespace'=>'Admin'), function()
//{
//    Route::get('/admin', array('as' => 'admin', 'uses' => 'LoginController@index'));
//});