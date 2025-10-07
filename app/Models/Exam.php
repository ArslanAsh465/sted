<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'exam_category_id',
        'class_id',
        'user_id',
        'name',
        'description',
        'fee',
        'status',
        'date',
    ];

    public function category()
    {
        return $this->belongsTo(ExamCategory::class, 'exam_category_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function centers()
    {
        return $this->belongsToMany(Center::class, 'center_exam');
    }
}
