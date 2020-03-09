<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
            'name' => ['bail','required', 'string', 'max:32'],
            'password' => ['bail','min:8','max:255','sometimes', 'confirmed'],
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
            'name.required' => 'The name is required',
            'name.string' => 'The name must be string',

            'password.confirmed' => 'Confirmed and new password do not match'
        ];
    }

}
