<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstituteProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'principal_name',
        'mobile_no',
        'whatsapp_no',
        'email',
        'website',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'postal_code',
        'registration_number',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
