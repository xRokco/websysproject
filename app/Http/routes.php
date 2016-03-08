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

    /*
    |----------------------------------------------------------------------
    |Normal static page routes
    |----------------------------------------------------------------------
    |These routes return regular, static web pages that don't need to interact with the database to view them
    */

    //Route to return the about our team page
    Route::get('/about', function () {
        return view('about');
    });

    //Route to return the contact us page
    Route::get('/contact', function () {
        return view('contact');
    });

    //Route to return login page
    Route::get('/login', ['as' => 'login', function () {
        return view('auth/login');
    }]);

    //Route to return the disclaimer page
    Route::get('/disclaimer', function () {
        return view('disclaimer');
    });

    /*
    |----------------------------------------------------------------------
    |Redirection Routes
    |----------------------------------------------------------------------
    |These routes just redirect somewhere else if a user tries to visit a URI that's only partially completed
    |These routes have to appear in the Routes.php file BEFORE the routes they refer to which have the {id} in
    |them for them to work.
    */

    //Route to redirect to events page if user navigates to print page without an event ID present
    Route::get('/events/details/print', function () {
        return redirect('/events');
    });

    //Route to redirect to events page if user navigates to the deatails page without an event ID present
    Route::get('/events/details', function () {
        return redirect('/events');
    });

    /*
    |----------------------------------------------------------------------
    |Routes for calling Controller function
    |----------------------------------------------------------------------
    |These Routes return a function from a controller that then does some action, usually involving a database
    |query, database row creation, deletion or update, and often returns a view that uses the query result, or
    |redirects to a view after the creation, deletion or update.
    */

    //Route to return homepage
    Route::get('/', ['as' => 'welcome', 'uses' => 'GuestController@welcome']);

    //Route to be called when submit on create events page is clicked
    Route::post('/events', 'AdminController@store');

    //Route to be called when submit on contact us page is clicked
    Route::post('/contact','GuestController@contactUs');

    //Route to return the event details page
    Route::get('/events/details/{id}','UserController@getEventDetails');
    //Route to return the event details page
    Route::get('/past/pastDetails/{id}','UserController@getPastEventDetails');
    //Route to return GuestController@index and return the event page view
    Route::get('/events', ['as' => 'events', 'uses' => 'GuestController@index']);
    //Route to return GuestController@index and return the past events page view
    Route::get('/past', ['as' => 'past', 'uses' => 'GuestController@pastEvents']);
    //Route to add video page
    Route::get('/past/pastDetails/addVideo/{id}','UserController@addVideo');
     //Route to be called when submit on add video page is clicked
    Route::post('/past/pastDetails/addVideo/{id}', 'UserController@storeVideo');

    //Route to return the edit user info page.
    Route::get('/account', 'UserController@editUserInfo');
    
    //This is the route to print your ticket
    Route::get('/events/details/print/{id}','UserController@printEventTicket');

    //This is the route for the rsvp page
    Route::get('/dash', 'UserController@showUserEvents');

    // This is the route to attend an event
    Route::post('/events/details/attend','UserController@attendEvent');

    // This is the route to unattend an event 
    Route::get('/events/details/unattend/{id}','UserController@unattendEvent');

    //This is called when the submit button on the edit user info page is clicked.
    Route::patch('/dash/{id}','UserController@updateUser');

    Route::post('/past','UserController@storeComment');

    /*
    |----------------------------------------------------------------------
    |Admin Page Routes
    |----------------------------------------------------------------------
    |Routes for anything related to the admin pages, which all call a controller due to there needing to be an
    |IsAdmin check before returning them, as well as most of the pages relying heavily on the database.
    */
    //Route to return the admin homepage
    Route::get('/admin', 'AdminController@index');

    //Route to return the create event page
    Route::get('/admin/create', 'AdminController@create');

    //Route to return the page that lists all attendees for event with coresponding ID
    Route::get('/admin/attendees/{id}','AdminController@getAttendees');

    //Route to return the page that lists all the tickets for all attendees for a given event with corresponding ID
    Route::get('/admin/attendees/print/{id}','AdminController@printAttendees');

    //This is the route to delete an event
    Route::get('/admin/delete/{id}','AdminController@deleteEvent');

    //Route to return the edit event info page.
    Route::get('/admin/edit/{id}', 'AdminController@editEventInfo');

    //Route to mark contact us messages as read (i.e. delete them)
    Route::get('/admin/inbox/delete/{id}', 'AdminController@markAsRead');

    //This is called when the submit button on the edit event info page is clicked.
    Route::patch('/admin/edit/{id}','AdminController@updateEvent');
   
    //Route to return the manage users page.
    Route::get('/admin/manage', 'AdminController@manageAdmins');

    //Route to promote a regular user to admin.
    Route::get('/admin/promote/{id}', 'AdminController@promote');

    //Route to demote an admin to a regular user.
    Route::get('/admin/demote/{id}', 'AdminController@demote');

    //Route to delete a users comment.
    Route::get('/events/delete/{id}', 'AdminController@deleteComment');
});