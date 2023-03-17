<?php

namespace App\Services;

use App\Models\VaccineRegistration;

class GlobalService
{
    public function updateStatusIfExceed(): void
    {
        VaccineRegistration::where('scheduled_date', '<=', now())
            ->update([
                'registration_status' => 'VACCINATED',
            ]);
    }
}
