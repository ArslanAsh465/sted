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

    // Generate Institute STED ID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->siid = self::generateUniqueSiid();
        });
    }

    public static function generateUniqueSiid()
    {
        do {
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $siid = 'SIID' . $randomNumber;
        } while (self::where('siid', $siid)->exists());

        return $siid;
    }

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
