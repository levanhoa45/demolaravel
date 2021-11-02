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
            'img' => $this->faker->image('public/storage/images',400,300, null, false),
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'content' => $this->faker->name(),
            'price' => $this->faker->randomDigit(),
        ];
    }
}
