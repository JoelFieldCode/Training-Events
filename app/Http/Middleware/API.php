<?php 
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class API {

    public function handle($request, Closure $next)
    {       
            $headers = $request->headers->all();
            
            if(!isset($headers['jwt'])){
                 return response('no jwt', 403);
            }
            
            $request->jwt = $request->headers->all()['jwt'][0];
            
            $response = $next($request);
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type');
            $response->header('Access-Control-Allow-Origin', '*');
            return $response;
    }
}