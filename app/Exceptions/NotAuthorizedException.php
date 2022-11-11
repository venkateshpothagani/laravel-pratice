<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class NotAuthorizedException extends Exception
{

    public function render(Request $request): Response
    {
        $status = 403;
        $error = "Authorization Failed";
        $help = $this->message;

        return response(["error" => $error, "help" => $help], $status);
    }
}
