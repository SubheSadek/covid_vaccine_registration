<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\VaccineCenterResource;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;

class VaccineCenterController extends Controller
{
    //It's scrollable vaccine list
    public function vaccineCenterList(Request $request)
    {
        $search = $request['search'] ?? null;
        $lastId = $request['lastId'] ?? null;
        $centers = VaccineCenter::when($search, function ($q, $search) {
            $q->where('center_name', 'like', '%' . $search . '%');
        })->when($lastId, function ($q, $lastId) {
            $q->where('id', '<', $lastId);
        })
            ->limit(10)->latest('id')
            ->get(['id', 'center_name', 'vaccine_per_day']);

        return withSuccess(VaccineCenterResource::collection($centers));
    }
}
