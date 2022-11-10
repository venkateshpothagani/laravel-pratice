<?php

use Illuminate\Validation\Rules\Password;

class CustomValidator
{
    /**
     * Validates password
     */
    public static function password_validator($password, $length = 8)
    {
        $result = Password::min($length)->mixedCase()->numbers()->symbols();
    }
}
