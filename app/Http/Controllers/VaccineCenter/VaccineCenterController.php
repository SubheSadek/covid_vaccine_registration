<?php

namespace App\Http\Controllers\VaccineCenter;

use App\Http\Controllers\Controller;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    public function vaccineCenterList(Request $request)
    {
        $centers = VaccineCenter::all();
        return withSuccess($centers);
    }
}
