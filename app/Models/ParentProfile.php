<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
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
            $model->spid = self::generateUniqueSpid();
        });
    }

    public static function generateUniqueSpid()
    {
        do {
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $spid = 'SPID' . $randomNumber;
        } while (self::where('spid', $spid)->exists());

        return $spid;
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
