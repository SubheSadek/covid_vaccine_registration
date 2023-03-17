<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'scheduled_date',
        'registration_status',
    ];

    public function center(): HasOne
    {
        return $this->hasOne(VaccineCenter::class, 'id', 'vaccine_center_id');
    }

    public function setMyStringAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
