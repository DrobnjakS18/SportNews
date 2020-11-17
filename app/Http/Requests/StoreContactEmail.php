<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactEmail extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'surname' => ['bail','required','string','min:2','max:50'],
            'email' => ['bail','required','email'],
            'subject' => ['bail','required','min:2','max:75'],
            'message' => ['bail','required','min:2','max:1000']
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
            'surname.min' => 'Surname min. number of character is 2',
            'surname.max' => 'Surname min. number of character is 50',
            'surname.string' => 'Surname must be a string',

            'email.required' => 'Email is required.',
            'email.email' => 'Must be a verified email',

            'subject.required' => 'Subject is required',
            'subject.min' => 'Subject min. number of character is 2',
            'subject.max' => 'Subject min. number of character is 75',

            'message.required' => 'Message is required',
            'message.min' => 'Message min. number of character is 2',
            'message.max' => 'Message min. number of character is 1000',

        ];
    }
}
