<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdmin;
use App\Http\Requests\UpdateAdmin;
use Auth;

use App\Http\Requests\Login;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * Log out admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin');
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

    /**
     * Display a listing of all admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $adminService = new AdminService;

        $admins = $adminService->getAllSorted();

        return view('admin.pages.admins', compact('admins'));
    }

    /**
     * Show the form for adding new admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.adminCreate');
    }

    /**
     * Store a newly created admin in DB.
     *
     * @param  \App\Http\Requests\StoreAdmin $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        $adminService = new AdminService;

//        dd($request->password,Hash::make($request->password));

        $response = $adminService->store($request->first_name, $request->last_name, $request->email, $request->password);

        return json_encode($response);
    }

    /**
     * Show the form for editing existing admin.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminService = new AdminService;

        $admin = $adminService->get($id);

        return view('admin.pages.adminEdit', compact('admin'));
    }

    /**
     * Update the specified admin in DB.
     *
     * @param  \App\Http\Requests\UpdateAdmin $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdmin $request, $id)
    {
        $adminService = new AdminService;

        $response = $adminService->update($id, $request->first_name, $request->last_name, $request->email, $request->password);

        return json_encode($response);
    }

    /**
     * Remove the specified admin from DB.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adminService = new AdminService;

        $adminService->delete($id);

        return redirect()->route('admin.admins');
    }
}
