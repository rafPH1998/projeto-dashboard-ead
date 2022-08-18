<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupprt extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'support_id',
        'user_id',
        'admin_id',
    ];
}
