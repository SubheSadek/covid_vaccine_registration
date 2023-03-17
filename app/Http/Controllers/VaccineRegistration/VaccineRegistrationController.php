<?php

namespace App\Http\Controllers\VaccineRegistration;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineRegistrationRequest;
use App\Mail\VaccineNotification;
use App\Models\VaccineRegistration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VaccineRegistrationController extends Controller
{
    protected $regService;

    public function __construct(VaccineRegistrationService $regService)
    {
        $this->regService = $regService;
    }

    /**
     * Handles the registration of a new vaccine through a VaccineRegistrationRequest.
     *
     * Validates the request data and creates a new vaccine registration record using the provided
     * vaccine_center_id. The scheduled date for the registration is obtained using the
     * getNextAvailableDateForCenter method from the regService.
     *
     * @param  VaccineRegistrationRequest  $request The request object containing the vaccine registration data.
     * @return mixed Returns a success message if the registration is successful. Otherwise, returns an error message with the exception message.
     *
     * @throws \Exception Throws an exception if an error occurs during the registration process.
     */
    public function registerVaccine(VaccineRegistrationRequest $request)
    {
        $requestData = $request->validated();

        DB::beginTransaction();
        try {
            $requestData['scheduled_date'] = $this->regService->getNextAvailableDateForCenter((int) $requestData['vaccine_center_id']);
            $registration = VaccineRegistration::create($requestData);
            $emailData = $this->regService->emailData($registration);

            // We're creating a Carbon instance with the vaccination date, subtracting one day, setting the time to 9 PM,
            // and converting it to the Bangladesh time zone. We're then queuing a new instance of the VaccineNotification
            // mail class to be sent to the user at the specified notification time.

            $notification_time = Carbon::parse($emailData['scheduled_date'])->subDay()->setTimezone('Asia/Dhaka')->setTime(21, 0, 0);
            Mail::to($emailData['email'])->later($notification_time, new VaccineNotification($emailData));
            DB::commit();

            return withSuccess(null, 'Registration Successful');
        } catch (\Exception $e) {
            DB::rollBack();

            return withError($e->getMessage(), 400);
        }
    }
}
