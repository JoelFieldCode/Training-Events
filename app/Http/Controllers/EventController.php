<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\DB;
use Response;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use \Firebase\JWT\JWT;
use Carbon\Carbon;

class EventController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    // Get all actors
    public function index($location = "null"){
        
        $headers = apache_request_headers();
        
        if(!isset($headers['jwt'])){
            abort(403);
        }
        
        $jwt = $headers['jwt'];

        $key = "secret";
        
        $events = Event::whereRaw("location = ? ORDER BY date ASC", array($location))->get();
        
        $eventArray = array();
        
        foreach($events as $event){
            $event->dateTime = $event->getIso();
            array_push($eventArray, $event);
        }
        
        $eventArray = array_filter($eventArray, function($event){
           return Carbon::now()->timestamp < $event["date"];
        });
        
        $firstFive = array_slice($eventArray, 0, 5);
        
        return Response::json($firstFive);
        
    }
    
    // Find actor
    public function find($id){
        

    }

}
