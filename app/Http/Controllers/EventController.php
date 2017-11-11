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
    
    // get latest 5 events that are in the future, filtering by location
    public function index($location){
        
        // get current timestamp
        $now = Carbon::now()->timestamp;
        
        // get 5 events with a given location that are in the future, ordered by now to latest
        $events = Event::whereRaw("location LIKE ? AND date > ? ORDER BY date ASC LIMIT 5", array($location,$now))->get();
        
        // get iso timestamp for each response
        foreach($events as $event){
            $event->dateTime = $event->getIso();
        }
        
        return Response::json($events);
        
    }

}
