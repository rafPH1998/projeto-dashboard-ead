<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::make($value)->format('d/m/Y')
        );
    }
    
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::url($value) : null
        );
    }

    public function scopeLastWeek()
    {
        return $this->whereDate('created_at', '>=', now()->subDays(4));
    }

    public function scopeToday()
    {
        return $this->whereDate('created_at', '=', now());
    }

}