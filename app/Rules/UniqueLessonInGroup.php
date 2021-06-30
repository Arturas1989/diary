<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Lesson;
use Illuminate\Http\Request;

class UniqueLessonInGroup implements Rule
{
    
    private $request;
    /**
     * Create a new rule instance.
     *@param Request $request
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // dd($value);
        return $value != 'foo';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'error message';
    }
}
