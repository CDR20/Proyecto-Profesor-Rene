<?php

namespace Database\Factories;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Sale::makeSaleCode(),
            'client_id' => rand(1,25),
            'user_id' => rand(1,17)
        ];
    }
}