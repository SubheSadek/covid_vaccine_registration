<?php

namespace App\Http\Controllers\VaccineCenter;

use App\Http\Controllers\Controller;
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
            $q->where('center_name', 'like', '%'.$search.'%');
        })->when($lastId, function ($q, $lastId) {
            $q->where('id', '<', $lastId);
        })
            ->limit(10)->latest('id')
            ->get(['id as value', 'center_name as name', 'vaccine_per_day']);

        return withSuccess($centers);
    }
}
