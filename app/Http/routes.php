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
$key = "secret";

// get events with a optional location paramater
Route::get('events/{location?}', ['middleware' => 'api', function (Illuminate\Http\Request $request, $location = "null") {
    // call event index controller, passing the location and the jwt
    $eventController = new \App\Http\Controllers\EventController;
    if($location === "null"){
        $location = $request->jwt["location"];
    }
    
    return $eventController->index($location);
}]);


