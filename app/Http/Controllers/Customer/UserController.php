<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Support\Facades\Auth;
use Exception;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('pages.customer.auth.signup');
    }

    public function getLogin()
    {
        return view('pages.customer.auth.login');
    }
    public function registration(Request $request)
    {
        try{
            $user = User::where('phone', $request->phone)->first();
            if($user){
                throw new Exception("User found");
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            $user->save();
            Auth::login($user);
            return ['status'=>1];
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ]);
        }

    }

    function verifyOTP(Request $request)
    {
        try{
            $user = User::where('phone', $request->phone)->first();
            if(!$user){
                throw new Exception("User Not found");
            }
            $user->verification=1;
            $user->save();
            return ['status'=>1];
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ],404);
        }
    }
}