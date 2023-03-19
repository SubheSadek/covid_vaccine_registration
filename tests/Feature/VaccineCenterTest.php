<?php

namespace Tests\Feature;

use Database\Factories\VaccineCenterFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VaccineCenterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_vaccine_center_list()
    {
        $centers = VaccineCenterFactory::new()->count(10)->create();
        $response = $this->getJson('/vaccine-center-list')->assertOk();
        $this->assertCount($centers->count(), $response->json()['json_data']);
    }
}
