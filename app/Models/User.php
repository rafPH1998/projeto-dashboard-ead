<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'image'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
        );
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
    
    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? format_document($value) : null
        );
    }
}
