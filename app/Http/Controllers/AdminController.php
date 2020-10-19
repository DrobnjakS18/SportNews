<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\Login;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        return view('admin.pages.login');
    }

    /**
     * Authenticate admin.
     *
     * @param  \App\Http\Requests\Login  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Login $request)
    {
        $adminService = new AdminService;

        return $adminService->login($request->only('email', 'password'));
    }

    /**
     * Show admin home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

}
