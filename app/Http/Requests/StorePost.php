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
            'url' => ['bail','required']
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

            'url.required' => 'Headline image is required',
//            'url.url' => 'Headline image invalid'

        ];
    }

}
