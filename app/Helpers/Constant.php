<?php

namespace App\Helpers;

class Constant
{
    const HTTP_BAD_REQUEST_400 = 400;
    const HTTP_OK_200 = 200;
    const HTTP_CREATE_201 = 201;
    const HTTP_INTERNAL_SERVER_ERROR_500 = 500;


    const VALID_JSON_REQUEST_TYPES = array('todos', 'posts', 'comments', 'users');
}
