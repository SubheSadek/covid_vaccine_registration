<?php

namespace App\Http\Controllers\VaccineRegistration;

use App\Models\VaccineCenter;
use App\Models\VaccineRegistration;
use App\Utilities\Utility;

class VaccineRegistrationService
{
    /**
     * Returns the next available date for scheduling a vaccine registration at a given center.
     *
     * @param  int  $centerId The ID of the vaccine center to check.
     * @return string The next available date in the format 'Y-m-d'.
     *
     * @throws Exception If there was an error fetching data from the database.
     */
    public function getNextAvailableDateForCenter(int $centerId): string
    {
        try {
            $vaccineLimit = VaccineCenter::where('id', $centerId)->value('vaccine_per_day');
            $latestDate = VaccineRegistration::where('vaccine_center_id', $centerId)->max('scheduled_date');
        } catch (\Exception $e) {
            throw new \Exception('Error while fetching data from the database.');
        }

        // If there are no scheduled dates for the given center, return the next day as the available date.
        if (! $latestDate) {
            $nextDate = date(Utility::DATE_FORMAT, strtotime(Utility::ONE_DAY));

            return $this->getNextNonWeekendDay($nextDate);
        }

        // If the daily vaccine limit has been reached, return the next available date.
        $registrationCount = VaccineRegistration::where('scheduled_date', $latestDate)->count();
        if ($registrationCount >= $vaccineLimit) {
            $nextDate = date(Utility::DATE_FORMAT, strtotime($latestDate.Utility::ONE_DAY));

            return $this->getNextNonWeekendDay($nextDate);
        }

        // If the daily vaccine limit has not been reached, return the latest scheduled date.
        return $this->getNextNonWeekendDay($latestDate);
    }

    /**
     * Returns the next non-weekend day after the given date.
     *
     * If the given date is a weekend day (Saturday or Sunday), returns the next weekday.
     * If the given date is today, returns the next day.
     *
     * @param  string  $date A date in YYYY-MM-DD format
     * @return string The next non-weekend day in YYYY-MM-DD format
     */
    public function getNextNonWeekendDay($date): string
    {
        // If the date is today, set it to tomorrow
        if ($date === date(Utility::DATE_FORMAT)) {
            $date = date(Utility::DATE_FORMAT, strtotime($date.Utility::ONE_DAY));
        }

        // Check if the given date falls on a weekend (Friday or Saturday).
        $dayOfWeek = date('w', strtotime($date));
        if ($dayOfWeek == 5 || $dayOfWeek == 6) {
            $date = date(Utility::DATE_FORMAT, strtotime($date.' next sunday'));
        }

        return $date;
    }

    public function emailData(object $reg): array
    {
        return [
            'name' => $reg->name,
            'email' => $reg->email,
            'scheduled_date' => $reg->scheduled_date,
        ];
    }
}
