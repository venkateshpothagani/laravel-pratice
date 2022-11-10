<?php

namespace App\Helpers;

use App\Helpers\Constant;

class CustomValueGenerator
{

    /**
     *
     * Generate a password of given length. Min length is 8.
     *
     * @param int $length
     */
    public static function get_password(int $length = 8)
    {
        $upper_case = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';


        $characters = [$upper_case,  $numbers,];

        $password = "";

        while (strlen($password) < $length) {
            for ($i = 0; $i < $length; $i++) {
                $character_set =  $characters[rand(0, count($characters) - 1)];
                $password = $password . $character_set[rand(0, strlen($character_set) - 1)];
            }
        }

        return $password;
    }
}
