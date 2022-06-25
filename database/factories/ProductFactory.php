<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $img = array(
            'https://via.placeholder.com/700x500.png/005533?text=consequatur',
            'https://via.placeholder.com/700x500.png/00ee66?text=nulla',
            'https://via.placeholder.com/700x500.png/00cccc?text=adipisci',
        );
        return [
            'cate_id' => $this->faker->numberBetween(1,25),
            'name' => $this->faker->realText(30),
            'slug' => Str::slug($this->faker->realText(20)),
            'price' => $this->faker->numberBetween(300,900),
            'discount' => $this->faker->numberBetween(1,9),
            'condition' => $this->faker->randomElement(['hot','sale','new']),
            'status' => 1,
            'short' => $this->faker->realText(100),
            'desc' => $this->faker->realText(500),
            'img' => json_encode($img),
            'new' => $this->faker->randomElement(['1','0']),
            'popular' => $this->faker->randomElement(['1','0']),
            'feature' => $this->faker->randomElement(['1','0']),
            'best' => $this->faker->randomElement(['1','0']),
        ];
    }
}
