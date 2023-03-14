<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_center_id',
        'name',
        'phone',
        'email',
        'nid',
        'address',
        'birth_date',
    ];
}
