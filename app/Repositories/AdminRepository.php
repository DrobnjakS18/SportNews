<?php


namespace App\Repositories;

use App\Models\Admin;

use Illuminate\Support\Facades\Hash;

class AdminRepository
{
    public function __construct()
    {
        $this->className = 'App\Models\Admin';
    }

    static public function allSorted($orderBy = 'first_name', $order = 'asc')
    {
        return Admin::orderBy($orderBy, $order)->get();
    }

    static public function findById($id)
    {
        return Admin::where('id', $id)->first();
    }

    static public function create($data)
    {
        $admin = new Admin;

        if (isset($data['first_name'])) {
            $admin->first_name = $data['first_name'];
        }

        if (isset($data['last_name'])) {
            $admin->last_name = $data['last_name'];
        }

        if (isset($data['email'])) {
            $admin->email = $data['email'];
        }

        if (isset($data['password'])) {
            $admin->password = Hash::make($data['password']);
        }

        $admin->save();

        return $admin;
    }

    static public function update($id, $data)
    {
        $admin = self::findById($id);

        if (isset($data['first_name'])) {
            $admin->first_name = $data['first_name'];
        }

        if (isset($data['last_name'])) {
            $admin->last_name = $data['last_name'];
        }

        if (isset($data['email'])) {
            $admin->email = $data['email'];
        }

        if (isset($data['password'])) {
            $admin->password = Hash::make($data['password']);
        }

        $admin->save();

        return $admin;
    }

    static public function delete($id)
    {
        return Admin::destroy($id);
    }
}
