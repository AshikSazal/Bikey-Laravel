<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class AdminController extends Controller
{
    public function getAdminLandingPage()
    {
        return view('pages.admin.landing-page');
    }

    public function getAdminLogin()
    {
        return view('pages.admin.auth.login');
    }

    public function postAdminLogin(Request $request)
    {
        try {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('admin.dashboard');
            }
            throw new Exception("Invalid Email & Password");
        } catch (Exception $exp) {
            return response()->json([
                'message' => $exp->getMessage(),
            ], 404);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
