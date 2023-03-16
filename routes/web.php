<?php

use App\Http\Controllers\VaccineCenter\VaccineCenterController;
use App\Http\Controllers\VaccineRegistration\VaccineRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(VaccineRegistrationController::class)->group(function ($route) {
    $route->post('register-vccine', 'registerVaccine')->name('register.vccine');
});

Route::controller(VaccineCenterController::class)->group(function ($route) {
    $route->get('vaccine-center-list', 'vaccineCenterList')->name('vaccine.center.list');
});


Route::get('/{all?}', function () {
    return view('welcome');
})->where(['all' => '.*']);
