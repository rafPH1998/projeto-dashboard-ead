<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id'
    ];

    //um modulo pertence pertence a um curso
    public function course()
    { 
        return $this->belongsTo(Course::class);
    }

    //um modulo tem varias aulas
    public function lessons()
    { 
        return $this->hasMany(Lesson::class);
    }
}