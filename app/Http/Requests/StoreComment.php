<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
            'message' => ['bail','required','max:1000'],
            'recaptcha' => ['bail','required']
        ];
    }

//
//    /**
//     * Get custom messages for validator errors.
//     *
//     * @return array
//     */
//    public function messages()
//    {
//        return [
//            'message.required' => 'Message is required',
//            'message.max' => 'Max length is 1000 letters',
//        ];
//    }
}
