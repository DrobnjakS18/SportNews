<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePassword extends FormRequest
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
            'current' => ['bail','min:8','required'],
            'password' => ['bail','min:8', 'confirmed','required'],
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
            'current.required' => 'Password is required',
            'current.min' => 'Min password length 8 characters',

            'password.required' => 'Password is required',
            'password.min' => 'Min password length 8 characters',
            'password.confirm' => 'Confirmed and new password do not match'
        ];
    }
}
