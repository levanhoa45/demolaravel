<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => $this->faker->imageUrl($width = 1200, $height = 1486, 'cats', true, 'Faker', true),
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'content' => $this->faker->name(),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
