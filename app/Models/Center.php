<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name',
        'status',
        'address',
        'city_id',
        'state_id',
        'country_id',
        'postal_code',
    ];

    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'center_exam');
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
