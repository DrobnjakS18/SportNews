<?php

namespace App\Http\Requests;

use App\Rules\NotEmptyHtml;
use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => ['bail','required','unique:posts,title'],
            'category' => ['bail','required','exists:categories,name'],
            'content' => ['bail','required', new NotEmptyHtml],
            'file' => ['bail','max:1999','required','image','dimensions:width=570,height=321']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.text' => 'Subject must be text',
            'title.required' => 'Subject is required',
            'title.unique' => 'Subject already exists',

            'category.required' => 'Category is required',
            'category.exists' => 'Unknown category selected',

            'content.required' => 'Content is required',

            'file.dimensions' => 'File dimensions must be 570x321px'
        ];
    }

}
