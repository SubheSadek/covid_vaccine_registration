<?php

namespace App\Http\Controllers\VaccineRegistration;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineRegistrationRequest;
use App\Models\VaccineRegistration;
use Illuminate\Support\Facades\DB;

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
     * @param VaccineRegistrationRequest $request The request object containing the vaccine registration data.
     * @return mixed Returns a success message if the registration is successful. Otherwise, returns an error message with the exception message.
     * @throws \Exception Throws an exception if an error occurs during the registration process.
     */

    public function registerVaccine(VaccineRegistrationRequest $request)
    {
        $requestData = $request->validated();

        DB::beginTransaction();
        try {
            $requestData['scheduled_date'] = $this->regService->getNextAvailableDateForCenter((int) $requestData['vaccine_center_id']);
            VaccineRegistration::create($requestData);
            DB::commit();
            return withSuccess(null, 'Registration Successful');
        } catch (\Exception $e) {
            DB::rollBack();
            return withError($e->getMessage(), 400);
        }
    }
}
