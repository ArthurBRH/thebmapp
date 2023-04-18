<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'creator_id',
        'title',
    ];

    public function event_detail()
    {
        return $this->HasOne(Event_detail::class);
    }
    public function event_user()
    {
        return $this->HasMany(Event_user::class);
    }
}
