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

/* Route::get('/', function () {
  return view('home');
  }); */
/* FRONTEND Routes */

Route::get('/', array('as' => '/', 'uses' => 'FrontendController@index'));
Route::get('contact', array('as' => 'contact', 'uses' => 'FrontendController@contactUs'));
Route::get('team', array('as' => 'team', 'uses' => 'FrontendController@team'));
Route::get('services', array('as' => 'services', 'uses' => 'FrontendController@services'));
Route::get('sponsors', array('as' => 'sponsors', 'uses' => 'FrontendController@sponsors'));
Route::get('live', array('as' => 'live', 'uses' => 'FrontendController@live'));
Route::get('all-events', array('as' => 'all-events', 'uses' => 'FrontendController@allEvents'));
Route::get('past-events', array('as' => 'past-events', 'uses' => 'FrontendController@pastEvents'));
Route::get('calendar', array('as' => 'calendar', 'uses' => 'FrontendController@calendar'));
Route::get('event/{id?}', array('as' => 'event', 'uses' => 'FrontendController@event'));



/* END Frontend Routes */

Route::get('/logs', array('as' => 'logs', 'uses' => 'Activity_logController@index'));
/* ADD TOKEN recieved from the authanticate controller and pass it with the url as request */
Route::get('/authtest', array('middleware' => 'jwt.auth', function() {
echo "HOLA";
}));


Route::group(array('prefix' => 'api/v1'), function() {
    /* ADD EMAIL/USERNAME and PASSWORD with the url as request it'll return token */
    Route::get('/auth', array('as' => 'auth', 'uses' => 'Auth\AuthController@authenticate'));
    Route::get('festival', array('as' => 'festival', 'uses' => 'FestivalController@index'));
    Route::resource('festival', 'FestivalController');
    Route::resource('multimedia', 'MultimediaController');
    Route::resource('person', 'PersonController');
    Route::resource('user', 'UserController');
    Route::resource('association', 'AssociationController');
    Route::resource('guest', 'GuestController');
    Route::resource('performer', 'PerformerController');
    Route::resource('schedule', 'ScheduleController');
    Route::get('collab', array('as' => 'collab', 'uses' => 'CollaboratorController@index'));
    //Route::resource('collab', 'CollaboratorController');
});
/* Festival */
/* Route::get('festival', array('as' => 'festival', 'uses' => 'FestivalController@index'));
  Route::get('f_create', array('as' => 'f_create', 'uses' => 'FestivalController@create'));
  Route::post('f_store', array('as' => 'f_store', 'uses' => 'FestivalController@store'));
  Route::get('f_edit', array('as' => 'f_edit', 'uses' => 'FestivalController@edit'));
  Route::post('f_update', array('as' => 'f_update', 'uses' => 'FestivalController@update'));
  Route::post('f_delete', array('as' => 'f_delete', 'uses' => 'FestivalController@delete')); */
/* END Festival */
/* Multimedia */
/* Route::get('multimedia', array('as' => 'multimedia', 'uses' => 'MultimediaController@index'));
  Route::get('mm_create', array('as' => 'mm_create', 'uses' => 'MultimediaController@create'));
  Route::post('mm_store', array('as' => 'mm_store', 'uses' => 'MultimediaController@store'));
  Route::get('mm_edit', array('as' => 'mm_edit', 'uses' => 'MultimediaController@edit'));
  Route::post('mm_update', array('as' => 'mm_update', 'uses' => 'MultimediaController@update'));
  Route::post('mm_delete', array('as' => 'mm_delete', 'uses' => 'MultimediaController@delete')); */
/* END Multimedia */
/* Person */
/*
Route::get('person', array('as' => 'person', 'uses' => 'PersonController@index'));
Route::get('p_create', array('as' => 'p_create', 'uses' => 'PersonController@create'));
Route::post('p_store', array('as' => 'p_store', 'uses' => 'PersonController@store'));
Route::get('p_edit', array('as' => 'p_edit', 'uses' => 'PersonController@edit'));
Route::post('p_update', array('as' => 'p_update', 'uses' => 'PersonController@update'));
Route::post('p_delete', array('as' => 'p_delete', 'uses' => 'PersonController@delete'));
*/
/* END Multimedia */
/* User */
Route::get('user', array('as' => 'user', 'uses' => 'UserController@index'));
Route::get('u_create', array('as' => 'u_create', 'uses' => 'UserController@create'));
Route::post('u_store', array('as' => 'u_store', 'uses' => 'UserController@store'));
Route::get('u_edit', array('as' => 'u_edit', 'uses' => 'UserController@edit'));
Route::post('u_update', array('as' => 'u_update', 'uses' => 'UserController@update'));
Route::post('u_delete', array('as' => 'u_delete', 'uses' => 'UserController@delete'));
/* END Multimedia */



/* BACKEND CONTROLLER */

Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('admin/login', array('as' => 'login', 'uses' => 'BackendController@login'));
Route::post('admin/loggingIn', array('as' => 'loggingIn', 'uses' => 'BackendController@loggingIn'));
Route::group(array('prefix' => 'admin', 'middleware' => 'auth'), function() {

    Route::get('out', array('as' => 'out', 'uses' => 'BackendController@getLogout'));
    Route::get('/', array('as' => '/', 'uses' => 'BackendController@index'));

    // EMAIL
    Route::get('sendmail', array('as' => 'sendmail', 'uses' => 'BackendController@getComposeMail'));
    Route::get('inbox', array('as' => 'inbox', 'uses' => 'BackendController@getInbox'));


    Route::get('festival', array('as' => 'festival', 'uses' => 'BackendController@f_index'));
    Route::get('f_create', array('as' => 'f_create', 'uses' => 'BackendController@f_create'));
    Route::post('f_store', array('as' => 'f_store', 'uses' => 'FestivalController@store'));
    Route::get('f_edit/{id?}', array('as' => 'f_edit', 'uses' => 'FestivalController@edit'));
    Route::post('f_update', array('as' => 'f_update', 'uses' => 'FestivalController@update'));
    Route::post('f_delete', array('as' => 'f_delete', 'uses' => 'FestivalController@delete'));

    /* Multimedia */
    Route::get('multimedia', array('as' => 'multimedia', 'uses' => 'BackendController@mm_index'));
    Route::get('mm_create', array('as' => 'mm_create', 'uses' => 'BackendController@mm_create'));
    Route::post('mm_store', array('as' => 'mm_store', 'uses' => 'MultimediaController@store'));
    Route::get('mm_edit', array('as' => 'mm_edit', 'uses' => 'MultimediaController@edit'));
    Route::post('mm_update', array('as' => 'mm_update', 'uses' => 'MultimediaController@update'));
    Route::post('mm_delete', array('as' => 'mm_delete', 'uses' => 'MultimediaController@delete'));
    /* END Multimedia */

    /* Associations */
    Route::get('association', array('as' => 'association', 'uses' => 'BackendController@ass_index'));
    Route::get('ass_create', array('as' => 'ass_create', 'uses' => 'BackendController@ass_create'));
    Route::post('ass_store', array('as' => 'ass_store', 'uses' => 'AssociationController@store'));
    Route::get('ass_edit', array('as' => 'ass_edit', 'uses' => 'AssociationController@edit'));
    Route::post('ass_update', array('as' => 'ass_update', 'uses' => 'AssociationController@update'));
    Route::post('ass_delete', array('as' => 'ass_delete', 'uses' => 'AssociationController@delete'));
    /* END Associations */

    /* Person */
    Route::get('person', array('as' => 'person', 'uses' => 'BackendController@p_index'));
    Route::get('p_create', array('as' => 'p_create', 'uses' => 'BackendController@p_create'));
    Route::post('p_store', array('as' => 'p_store', 'uses' => 'PersonController@store'));
    Route::get('p_edit/{id?}', array('as' => 'p_edit', 'uses' => 'PersonController@edit'));
    Route::post('p_update', array('as' => 'p_update', 'uses' => 'PersonController@update'));
    Route::post('p_delete', array('as' => 'p_delete', 'uses' => 'PersonController@delete'));
    /* END Multimedia */
    
    Route::post("remove_schedule/{id_activity}", array("as" => "remove_schedule", 'uses' => "BackendController@RemoveSchedule"));
});


Route::get('getCountry', array('as' => 'getCountry', 'uses' => 'BackendController@getCountry'));
Route::get('getCity/{country}', array('as' => 'getCity', 'uses' => 'BackendController@getCity'));
Route::get('getAssociation/{id}', array('as' => 'getAssociation', 'uses' => 'BackendController@getAssociation'));
Route::get('getPerson/{id}', array('as' => 'getPerson', 'uses' => 'BackendController@getPerson'));
Route::get('getGuest/{id}', array('as' => 'getGuest', 'uses' => 'BackendController@getGuest'));
Route::get('getPerformer/{id}', array('as' => 'getPerformer', 'uses' => 'BackendController@getPerformer'));
Route::get('getRoles', array('as' => 'getRoles', 'uses' => 'BackendController@getRoles'));




