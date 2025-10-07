<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
