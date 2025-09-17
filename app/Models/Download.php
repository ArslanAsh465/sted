<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'file_path',
        'status',
        'start_time',
        'end_time',
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
