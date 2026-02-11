<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class onlyMe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check())
            {
                if(auth()->user()->email == 'nx@gmail.com'){
                    //allow request to proceed
                        return $next($request);//هاي بتسمح له بدخول
                }
                return response( ["message" => "you don't have not proper"],403);

            }
            return response( ['message' => "you don't have access"],401);
    }
}
