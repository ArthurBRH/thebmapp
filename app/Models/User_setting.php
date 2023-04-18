<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'setting_id',
        'permission',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}
