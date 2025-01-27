<?php

namespace App\Rules;

use App\Komentar;
use Illuminate\Contracts\Validation\Rule;

class KomentarValid implements Rule
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
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Komentar::where('id', $value)->first(['id']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Komentar yang akan dibalas tidak valid.';
    }
}
