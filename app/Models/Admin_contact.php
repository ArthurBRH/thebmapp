<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BelongsTo;

class Admin_contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'status',
        'prio',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function log_request()
    {
        return $this->HasMany(Log_request::class);
    }
}
