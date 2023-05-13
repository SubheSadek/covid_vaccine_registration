<?php

namespace App\Services;

use App\Models\VaccineRegistration;

class GlobalService
{
    public function updateStatusWhenScheduledDateExpired(): void
    {
        VaccineRegistration::where('scheduled_date', '<=', now())
            ->update([
                'registration_status' => 'VACCINATED',
            ]);
    }
}
