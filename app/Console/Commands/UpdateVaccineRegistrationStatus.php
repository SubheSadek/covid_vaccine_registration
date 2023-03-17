<?php

namespace App\Console\Commands;

use App\Services\GlobalService;
use Illuminate\Console\Command;

class UpdateVaccineRegistrationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-vaccine-registration-status-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '
        This command will check if user vaccine scheduled date exceed or not. 
        If exceed, it will change status to VACCINATED
    ';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        (new GlobalService)->updateStatusIfExceed();
    }
}
