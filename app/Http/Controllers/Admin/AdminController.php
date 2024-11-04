<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

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

    public function getAdminChat()
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();
        $customers = $admin->receivedChats()->get()->unique('receiver_id');
        return view('pages.admin.admin-chat',compact('customers'));
    }

    public function getUserChats($userId)
    {
        $user = User::findOrFail($userId);

        // Retrieve all chats sent or received by this user
        $chats = $user->sentChats()->with('receiver')->get()->merge($user->receivedChats()->with('sender')->get());

        return view('pages.admin.admin-chat', compact('chats'));
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
