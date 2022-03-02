<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ean13' => $this->faker->ean13(),
            'name' => $this->faker->words(3, true),
            'stock' => $this->faker->numberBetween(1, 10000),
            'cost' => $this->faker->randomFloat(2, 0, 5000),
            'price' => $this->faker->randomFloat(2, 0, 10000),
        ];
    }
}
