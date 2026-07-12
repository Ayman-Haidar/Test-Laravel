<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */


    // protected array $except =[
    //     'user',
    // ];
    public function handle(Request $request, Closure $next): Response
    {
        // if($request->route() && in_array($request->route()->getName(),$this->except)){
        //     return $next($request);
        // }

        // if ($request->age < 18) {
        //     return response()->json([
        //         'message' => 'You are not allowed to access this route.']
        //         , 403);
        // }
        return $next($request);
    }
}
