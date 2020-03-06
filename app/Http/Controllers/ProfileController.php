<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('pages.profile');
    }

    /**
     * Update user profile image
     * @param Request $request
     * @return json
     */
    public function uploadImage(Request $request)
    {

        $userService = new UserService();

        $response = $userService::uploadProfileImage($request->user,$request->file('file'));

        return json_encode($response);
    }
}
