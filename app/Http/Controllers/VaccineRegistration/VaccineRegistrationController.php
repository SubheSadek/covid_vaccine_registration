<?php

namespace App\Http\Controllers\VaccineRegistration;

use App\Http\Controllers\Controller;
use App\Http\Requests\VaccineRegistrationRequest;
use App\Models\VaccineRegistration;

class VaccineRegistrationController extends Controller
{
    public function vaccineRegistration(VaccineRegistrationRequest $request)
    {
        $validated_data = $request->validated();
        VaccineRegistration::create($validated_data);
        return withSuccess(null, 'Registration Successful');
    }
}
