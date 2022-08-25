<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'status', 'user_id', 'lesson_id'];

    //pegando o usuario do support
    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    //pegando a aula que pertence ao support
    public function lesson()
    { 
        return $this->belongsTo(Lesson::class);
    }

    public function replies()
    { 
        return $this->hasMany(ReplySupport::class);
    }


}