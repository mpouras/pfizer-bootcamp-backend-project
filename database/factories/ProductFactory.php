<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->word(),
            'active_ingredients' => $this->faker->sentence(),
            'research_status' => $this->faker->randomElement(['Approved', 'In Development', 'Experimental']),
            'batch_number' => $this->faker->unique()->word() . '-' . $this->faker->numberBetween(1000, 9999),
            'manufacturing_date' => $this->faker->date(),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+2 years'),
        ];
    }
}
