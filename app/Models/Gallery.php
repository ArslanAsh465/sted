<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'user_id',
        'title',
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
