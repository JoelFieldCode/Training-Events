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
    public function index($location){
        
        // get current timestamp
        $now = Carbon::now()->timestamp;
        
        // get events with a given location that are in the future, ordered by now to latest
        $events = Event::whereRaw("location LIKE ? AND date > ? ORDER BY date ASC", array($location,$now))->get();
        
        $eventArray = array();
        
        // get iso timestamp for response
        foreach($events as $event){
            $event->dateTime = $event->getIso();
            array_push($eventArray, $event);
        }
        
        // get first five
        $firstFive = array_slice($eventArray, 0, 5);
        
        return Response::json($firstFive);
        
    }

}
