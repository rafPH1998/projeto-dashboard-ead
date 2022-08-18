<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'description', 'available',
    ];

    //trazer todos os modulos de um curso
    public function modules() : HasMany
    { 
        return $this->hasMany(Module::class);
    }
}