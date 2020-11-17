<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAdmin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['bail', 'required', 'max:255'],
            'last_name' => ['bail', 'required', 'max:255'],
            'email' => ['bail', 'required', 'unique:admins,email,' . Request::instance()->id, 'email', 'max:255'],
            'password' => ['bail', 'max:255'],
        ];
    }

    /**
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email is not formatted properly.',
            'email.unique' => 'This email address is already taken.',
        ];
    }
}
