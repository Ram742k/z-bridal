<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
        'address',
        'address_number',
        'city',
        'state',
        'zip',
        'emergency_contact_name',
        'emergency_contact_number',
        'years_of_experience',
        'position',
        'date_of_joining',
        'profile_image',
        'id_proof',
    ];

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
