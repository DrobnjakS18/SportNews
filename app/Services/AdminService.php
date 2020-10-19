<?php


namespace App\Services;

use Auth;
use Exception;

class AdminService
{

    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';

    const LOGIN_FAILED_MESSAGE = 'Invalid credentials!';

    const STATUS_CODE_OK = 200;
    const STATUS_CODE_FAILED = 403;

    static public function login($credentials)
    {
        return (!Auth::guard('admin')->attempt($credentials)) ? set_ajax_reponse_array(self::STATUS_FAILED, self::STATUS_FAILED, null, self::LOGIN_FAILED_MESSAGE) : set_ajax_reponse_array(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('admin.dashboard'), null);
    }

}
