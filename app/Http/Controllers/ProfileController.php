<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Update user profile
     * @param Request $request
     * @return json
     */
    public function update(UpdateUser $request)
    {
        $userService = new UserService();

        $response = $userService::updateAccount(clean($request->name,'p'),clean($request->password,'p'),$request->userId,$request->roleId);

        return json_encode($response);

    }
}
