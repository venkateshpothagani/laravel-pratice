<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CustomerTest extends TestCase
{


    public $base_url = 'http://localhost:8000/api';

    public function test_get_one_customer()
    {
        $url = $this->base_url . "/customer";

        $this->json("GET", $url)->assertStatus(Response::HTTP_OK)->assertJsonStructure(
            [
                "data" => [
                    "*" => [
                        "id",
                        "email",
                        "address",
                        "mobile_number"
                    ]
                ]
            ]
        );
    }

    public function test_post_add_customer_success()
    {
        $url = $this->base_url . "/customer";

        $email = fake()->email();
        $userName = fake()->userName();
        $address = fake()->address();
        $phoneNumber = fake()->phoneNumber();

        $payload = [
            "email" =>  $email,
            "name" => $userName,
            "address" =>  $address,
            "mobile_number" => $phoneNumber,
        ];

        $this->json("POST", $url, $payload)->assertStatus(Response::HTTP_CREATED)->assertExactJson(
            [
                "data" => [
                    "email" =>  $email,
                    "name" => $userName,
                    "address" =>  $address,
                    "mobile_number" => $phoneNumber,
                ]
            ]
        );



        // $this->assertDatabaseHas('customers', ['email' =>  $content['email'],]);
    }
}
