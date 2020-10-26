<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUser extends FormRequest
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
            'username' => ['bail', 'required', 'max:50','unique:users,name'],
            'url' => ['bail','required','url'],
            'email' => ['bail', 'required', 'unique:users', 'email', 'max:255'],
            'password' => ['bail', 'required', 'max:32'],
            'role' => ['bail', 'required', Rule::in(['2', '3']),]
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
            'username.required' => 'Username is required.',
            'username.max' => 'Username max characters 50.',
            'username.unique' => 'Username already exists in database.',

            'url.required' => 'Image is required.',
            'url.url' => 'Invalid image',

            'email.required' => 'Email is required.',
            'email.email' => 'Email is not formatted properly.',
            'email.unique' => 'This email address is already taken.',


            'password.required' => 'Password is required',
            'password.max' => 'Password max characters 32.',

            'role.required' => 'Rule is required',
            'role.between ' => 'Invalid role',
        ];
    }
}
