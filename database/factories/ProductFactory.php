<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => Product::makeProductCode(),
            'name' => $this->faker->word(),
            'shop_price' => $this->faker->randomFloat(2, 50, 1599),
            'provider_price' => $this->faker->randomFloat(2, 25, 759),
            'stock' => $this->faker->randomNumber(),
            'provider_id' => rand(1,20),
            'inversor_id' => rand(1,17)
        ];
    }
}