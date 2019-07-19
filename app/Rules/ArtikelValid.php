<?php

namespace App\Rules;

use App\Artikel;
use Illuminate\Contracts\Validation\Rule;

class ArtikelValid implements Rule
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
        return Artikel::where('id', $value)->first(['id']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Artikel yang akan dikomentari tidak valid.';
    }
}
