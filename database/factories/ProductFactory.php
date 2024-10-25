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
            'name' => $this->faker->unique()->word(),
            'category' => $this->faker->word(),
            'active_ingredients' => $this->faker->sentence(),
            'research_status' => $this->faker->randomElement(['Approved', 'In Development', 'Experimental']),
            'batch_number' => $this->generateBatchNumber(),
            'manufacturing_date' => $this->faker->date(),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+2 years'),
        ];
    }

    private function generateBatchNumber(): string
    {
        $letterPart = strtoupper($this->faker->lexify('??'));
        $numberPart1 = $this->faker->numerify('###');
        $numberPart2 = $this->faker->numerify('##');
        $digit = $this->faker->randomDigit();

        return "{$letterPart}-{$numberPart1}-{$numberPart2}-{$digit}";
    }
}
