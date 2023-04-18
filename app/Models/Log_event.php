<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_email',
        'logtype',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function request()
    {
        return $this->HasOne(Log_request::class);
    }

    public function logdeleted()
    {
        return $this->HasOne(Log_deleted_request::class);
    }
    public function createduser()
    {
        return $this->HasOne(Log_created_user::class);
    }
}
