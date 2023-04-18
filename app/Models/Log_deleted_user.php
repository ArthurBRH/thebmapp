<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_deleted_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_event_id',
        'user_id',
        'name',
        'email',
        'is_active',
    ];
    public function log_event()
    {
        return $this->belongsTo(Log_event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
