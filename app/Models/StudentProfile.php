<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'first_name',
        'last_name',
        'roll_no',
        'date_of_birth',
        'phone',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'postal_code',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->ssid = self::generateUniqueSsid();
        });
    }

    public static function generateUniqueSsid()
    {
        do {
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $ssid = 'SSID' . $randomNumber;
        } while (self::where('ssid', $ssid)->exists());

        return $ssid;
    }

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(ParentProfile::class, 'parent_id');
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
