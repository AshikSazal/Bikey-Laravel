<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Verify;

class UserController extends Controller
{
    public function registration(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->save();

        return ['flag'=>1];
    }

    function verifyOTP(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        $user->verification=1;
        $user->save();
    }
}
