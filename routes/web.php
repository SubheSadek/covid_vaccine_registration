<?php

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
    $route->post('vaccine-registration', 'vaccineRegistration')->name('vaccine.registration');
});
