<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invite_User extends Model
{
    use HasFactory;

    protected $fillable = [
        'invite_code',
        'name',
        'email',
        'role',
    ];
}

