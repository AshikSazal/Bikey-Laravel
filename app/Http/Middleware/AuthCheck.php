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
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Please Login First',
                    ], 401);
                }elseif($guard === 'user'){
                    return redirect()->route('user.login');
                }else{
                    return redirect()->route('admin.login');
                }
            }
        }catch(Exception $exp){
            return response()->json([
                'message' => $exp->getMessage(),
            ],404);
        }
        return $next($request);
    }
}
