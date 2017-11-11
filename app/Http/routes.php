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

// get events with a optional location paramater
Route::get('events/{location?}', ['middleware' => 'api', function (Illuminate\Http\Request $request, $location = "null") {
    
    // init event controller
    $eventController = new \App\Http\Controllers\EventController;
    
    /*
    ** if optional location param not passed then default back to the location stored in
    ** the jwt (if jwt is invalid or not present the middleware layer would have already caught it).
    */
    if($location === "null" && isset($request->jwt["location"])){
        $location = $request->jwt["location"];
    }
    
    // get events in the given location from the event controller
    return $eventController->index($location);
    
}]);


