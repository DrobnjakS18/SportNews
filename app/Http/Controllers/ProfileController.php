<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\Http\Requests\ValidateAuthor;
use App\Http\Requests\ValidateEmail;
use App\Http\Requests\ValidatePassword;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    private $userService;
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
        $this->userService = new UserService();
    }

    /**
     * Update user profile image
     * @param Request $request
     * @return json
     */
    public function uploadImage(Request $request)
    {
        $postService = new PostService();

        $response = $postService::uploadImage('profile/images',$request->file('file'),$request->user()->id);

        return json_encode($response);
    }

    /**
     * Update user profile
     * @param Request $request
     * @return json
     */
    public function update(UpdateUser $request)
    {
        $response = $this->userService::updateAccount(clean($request->name,'p'),clean($request->password,'p'),$request->userId,$request->roleId);

        return json_encode($response);
    }

    /**
     * Display author profile page
     * @param $name
     * @return Factory|\Illuminate\View\View
     */
    public function authorIndex($name)
    {
        $items = $this->userService::getByNamePostsPaginate($name);

        return view('pages.author_profile')->with(compact('items'));
    }

    /**
     * Display author edit profile page
     * @return Factory|\Illuminate\View\View
     */
    public function authorEdit($name)
    {
        return view('pages.author_edit');
    }

    /**
     * Update author profile
     * @param ValidateAuthor $request
     * @return void
     */
    public function authorUpdate(ValidateAuthor $request)
    {
        $respone = $this->userService::updateAuthor($request->user()->id,clean($request->name,'p'),clean($request->email,'p'),clean($request->about,'p'));

        return json_encode($respone);
    }

    /**
     * Display author edit password form
     * @return Factory|\Illuminate\View\View
     */
    public function editPassword($name)
    {
        return view('pages.author_password');
    }

    /**
     * Update author password
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function passwordUpdate(ValidatePassword $request)
    {
        $response = $this->userService::updatePassword($request);

        return json_encode($response);
    }


}
