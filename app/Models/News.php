<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'image_path',
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
