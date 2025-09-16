<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    protected $fillable = [
        'user_id',
        'institute_id',
        'first_name',
        'last_name',
        'phone',
        'qualification',
        'specialization',
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
            $model->stid = self::generateUniqueStid();
        });
    }

    public static function generateUniqueStid()
    {
        do {
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $stid = 'STID' . $randomNumber;
        } while (self::where('stid', $stid)->exists());

        return $stid;
    }

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function institute()
    {
        return $this->belongsTo(InstituteProfile::class, 'institute_id');
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
