<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MacAddress implements Rule
{
    public function passes($attribute, $value)
    {
        // Expresión regular para validar una dirección MAC
        $macRegex = '/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/';

        return preg_match($macRegex, $value);
    }

    public function message()
    {
        return 'La dirección MAC no es válida.';
    }
}
