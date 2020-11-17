<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateContact extends FormRequest
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
            'surname' => ['bail','required','string'],
            'email' => ['bail','required','email'],
            'subject' => ['bail','required','string', 'max:100'],
            'message' => ['bail','required','string','max:1500']
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
            'surname.required' => 'Surname is required',
            'surname.string' => 'Surname must be a string',

            'email.required' => 'Email is required',
            'email.email' => 'Must be a verified email',

            'subject.required' => 'Subject is required',
            'subject.string' => 'Subject must be a string',
            'subject.max' => 'Max number of characters 100',

            'message.required' => 'Message is required',
            'message.string' => 'Message must be a string',
            'message.max' => 'Max number of characters 1500',
        ];
    }
}
