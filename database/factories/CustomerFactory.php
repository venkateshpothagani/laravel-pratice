<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "email" => "venkateshpothagani@outlook.com",
            "name" => "Venkatesh Pothagani",
            "address" => "Kadapa",
            "mobile_number" => "7981512713"
        ];
    }
}
