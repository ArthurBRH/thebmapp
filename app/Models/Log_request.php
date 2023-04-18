<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_request extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_event_id',
        'eddited_id',
        'old_status',
        'new_status',
        'old_prio',
        'new_prio',
        'is-deleted',
    ];

    public function log_event()
    {
        return $this->belongsTo(Log_event::class);
    }
    public function admin_contact()
    {
        return $this->belongsTo(Admin_contact::class);
    }
}
