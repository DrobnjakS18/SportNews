<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotEmptyHtml implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the quill editor has any text inside
     *
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $stripped = strip_tags($value);

        return strlen($stripped) > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Content field is required.';
    }
}
