<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VaccineRegistration>
 */
class VaccineRegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $center = VaccineCenterFactory::new()->create();
        return [
            'vaccine_center_id' => $center->id,
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => '+88017' . fake()->randomNumber(8, true),
            'nid' => (string) fake()->numberBetween(pow(10, 16), pow(10, 17) - 1),
            'address' => fake()->address(),
            'birth_date' => fake()->date(),
            'scheduled_date' => fake()->dateTimeBetween('+1 day', '+1 month'),
        ];
    }
}
