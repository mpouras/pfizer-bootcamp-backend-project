<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductStoreTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_invalid_batch_number_during_store(): void
    {
        $response = $this->postJson('/api/products', [
            'name' => $this->faker->word,
            'category' => $this->faker->word,
            'active_ingredients' => $this->faker->word,
            'research_status' => 'Approved',
            'batch_number' => 'INVALID-BATCH#123',
            'manufacturing_date' => now()->toDateString(),
            'expiration_date' => now()->addYear()->toDateString(),
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['batch_number']);
    }

    public function test_invalid_dates_during_store(): void
    {
        $invalidCases = [
            [
                'data' => [
                    'name' => $this->faker->word,
                    'category' => $this->faker->word,
                    'active_ingredients' => $this->faker->word,
                    'research_status' => 'Approved',
                    'batch_number' => 'AB-123-45-6',
                    'manufacturing_date' => now()->addDay()->toDateString(),
                    'expiration_date' => now()->addYear()->toDateString(),
                ],
                'expectedErrors' => ['manufacturing_date']
            ],
            [
                'data' => [
                    'name' => $this->faker->word,
                    'category' => $this->faker->word,
                    'active_ingredients' => $this->faker->word,
                    'research_status' => 'Approved',
                    'batch_number' => 'AB-123-45-6',
                    'manufacturing_date' => now()->toDateString(),
                    'expiration_date' => now()->subDay()->toDateString(),
                ],
                'expectedErrors' => ['expiration_date']
            ]
        ];

        foreach ($invalidCases as $case) {
            $response = $this->postJson('/api/products', $case['data']);

            $response->assertStatus(422)
                ->assertJsonValidationErrors($case['expectedErrors']);
        }
    }
}
