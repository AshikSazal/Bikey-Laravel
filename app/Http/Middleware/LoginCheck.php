<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        try{
            if (filter_var($request->emailPhone, FILTER_VALIDATE_EMAIL)) {
                $user = User::where('email',$request->emailPhone)->first();
                if(!$user)
                    throw new Exception('Please signup first');
                elseif($user->verification!=1)
                    throw new Exception('Please verify your account');
            } else {
                $user = User::where('email',$request->emailPhone)->first();
                if(!$user)
                    throw new Exception('Please signup first');
                elseif($user->verification!=1)
                    throw new Exception('Please verify your account');
            }
            // if (!Auth::guard($guard)->user()) {
            //     throw new Exception('Please signup first');
            // }
            // if (Auth::guard($guard)->user()->verification != 1) {
            //     throw new Exception('Please verify your account');
            // }
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ],404);
        }
        return $next($request);
    }
}
