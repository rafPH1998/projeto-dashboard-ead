<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory;

    protected $table = 'reply_support';

    protected $fillable = [
        'description',
        'support_id',
        'user_id',
        'admin_id',
    ];

    //pegando as resposta do user
    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    //pegando as resposta do admin
    public function admin()
    { 
        return $this->belongsTo(Admin::class);
    }

    //pegando a qual suporte pertence as respostas
    public function support()
    { 
        return $this->belongsTo(Support::class);
    }

}
