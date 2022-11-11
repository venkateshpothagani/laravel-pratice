<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Exceptions\UnknownException;

class GetRecordController extends Controller
{
    public  function getRecord(Request $request, int $id)
    {
        $type = $request->query('type');

        if (!$type) {
            throw new UnknownException('type query parameter required');
        }


        if ($id < 1) {
            throw new UnknownException('id must be greater than 1');
        }

        $url = 'https://jsonplaceholder.typicode.com/' . $type . '/' . $id;

        $response = Http::get($url);

        // info($response->status());
        // info($response->ok());
        // info($response->successful());
        // info($response->failed());
        // info($response->serverError());
        // info($response->clientError());

        if ($response->serverError()) {
            throw new UnknownException('Server error occurred');
        }

        if ($response->clientError()) {
            throw new UnknownException('Bad request sent');
        }

        if ($response->successful()) {
            return $response->object();
        }
    }
}
