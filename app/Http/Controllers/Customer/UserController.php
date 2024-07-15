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
    public function signup(Request $request)
    {
        try{
            $this->validate($request,[
                'name'=>'required',
                'phone'=>'required|digits:11',
                'email'=>'email|required|unique:users',
                'password'=>'required|min:4'
            ]);
            $user = User::where('phone', $request->phone)->first();
            if($user){
                throw new Exception("User found");
            }
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->save();
            // Auth::login($user);
            // Auth::guard('user')->login($user);
            
            return ['status'=>1];
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ]);
        }
    }

    public function login(Request $request)
    {
        try{
            if (filter_var($request->emailPhone, FILTER_VALIDATE_EMAIL)) {
                if (Auth::guard('user')->attempt(['email' => $request->emailPhone, 'password' => $request->password])) {
                    return redirect()->route('home');
                }
            } else {
                if (Auth::guard('user')->attempt(['phone' => $request->emailPhone, 'password' => $request->password])) {
                    return redirect()->route('home');
                }
            }
            throw new Exception("Invalid Email & Password");
        }catch(Exception $exp){
            return response()->json([
                'error' => $exp->getMessage(),
            ],404);
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

    public function logout()
    {
        Auth::guard('user')->logout();
    }
}
