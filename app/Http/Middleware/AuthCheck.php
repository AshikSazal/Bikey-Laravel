<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard=null): Response
    {
        try{
            if (!Auth::guard($guard)->user()) {
                throw new Exception('Please Login First');
            }
        }catch(Exception $exp){
            return response()->json([
                'message' => $exp->getMessage(),
            ],404);
        }
        return $next($request);
    }
}
