<?php 
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Namshi\JOSE\SimpleJWS;

class API {

    public function handle($request, Closure $next)
    {       
        
            // get headers
            $headers = $request->headers->all();
        
            //assert whether request headers contain the JWT, if not then abort with a 403
            if(!isset($headers['jwt'])){
                 return response('no jwt', 403);
            }
            
            // try to decode the JWT
            try{
                $jws = SimpleJWS::load($request->headers->all()['jwt'][0]);
  
                // if the JWT is all good then put it directly in the request so it's easier to  access
                $request->jwt = $jws->getPayload();
            }
            // fail/abort if we can't
            catch(\Exception $e){
             return response('invalid jwt', 403);
            }
        
            $response = $next($request);
            $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type');
            $response->header('Access-Control-Allow-Origin', '*');
            return $response;
    }
}