<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Database\Factories\VaccineCenterFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        VaccineCenter::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        VaccineCenterFactory::new()->count(20)->create();
    }
}
