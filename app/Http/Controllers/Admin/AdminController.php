<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
