<?php


namespace App\Services;

use App\Repositories\AdminRepository;
use Auth;
use Exception;

class AdminService
{

    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';

    const LOGIN_FAILED_MESSAGE = 'Invalid credentials!';

    const STATUS_CODE_OK = 200;
    const STATUS_CODE_FAILED = 403;

    static public function setData($firstName, $lastName, $email, $password)
    {
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => $password,
        ];
    }

    static public function login($credentials)
    {
        return (!Auth::guard('admin')->attempt($credentials)) ? set_ajax_reponse_array(self::STATUS_FAILED, self::STATUS_FAILED, null, self::LOGIN_FAILED_MESSAGE) : set_ajax_reponse_array(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('admin.dashboard'), null);
    }

    static public function get($id)
    {
        $admin = AdminRepository::findById($id);

        if(!isset($admin->id)) throw new Exception("Wrong admin");

        return $admin;
    }


    static public function getAllSorted($orderBy = 'first_name', $order = 'asc')
    {
        return AdminRepository::allSorted($orderBy, $order);
    }

    static public function store($firstName, $lastName, $email, $password)
    {
        $data = self::setData($firstName, $lastName, $email, $password);

        AdminRepository::create($data);

        return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('admin.admins'), null);
    }

    static public function update($id, $firstName, $lastName, $email, $password)
    {
        $data = self::setData($firstName, $lastName, $email, $password);

       AdminRepository::update($id, $data);

        return set_ajax_reponse_object(self::STATUS_SUCCESS, self::STATUS_CODE_OK, route('admin.admins'), null);
    }

    static public function delete($id)
    {
        return AdminRepository::delete($id);
    }

}
