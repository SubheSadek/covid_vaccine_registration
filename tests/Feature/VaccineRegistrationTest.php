<?php

namespace Tests\Feature;

use Database\Factories\VaccineCenterFactory;
use Database\Factories\VaccineRegistrationFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VaccineRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_register_vaccine(): void
    {
        $center = VaccineCenterFactory::new()->create();
        $response = $this->postJson(
            '/register-vccine',
            [
                'vaccine_center_id' => $center->id,
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'phone' => '+88017'.fake()->randomNumber(8, true),
                'nid' => (string) fake()->numberBetween(pow(10, 16), pow(10, 17) - 1),
                'address' => fake()->address(),
                'birth_date' => fake()->date(),
                'scheduled_date' => fake()->dateTimeBetween('+1 day', '+1 month'),
            ]
        );

        $response->assertStatus(200);
    }

    public function test_show_registration()
    {
        $center = VaccineRegistrationFactory::new()->create();
        $response = $this->postJson(
            '/show-registration',
            [
                'nid' => $center->nid,
            ]
        );

        $response->assertStatus(200);
    }
}
