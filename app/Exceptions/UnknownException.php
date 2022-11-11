<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Helpers\Constant as Code;

class UnknownException extends Exception
{

    public function render(Request $request): Response
    {
        return response(
            ["error" => "UnknownException", "help" => $this->message],
            Code::HTTP_INTERNAL_SERVER_ERROR_500
        );
    }
}
