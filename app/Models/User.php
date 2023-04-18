<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'icon_color',
        'icon',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_info()
    {
        return $this->HasOne(User_info::class);
    }
    public function event_user()
    {
        return $this->HasMany(Event_user::class);
    }
    public function admin_contact()
    {
        return $this->HasOne(Admin_contact::class);
    }
    public function log_event()
    {
        return $this->HasMany(Log_event::class);
    }
    public function logdeleted()
    {
        return $this->HasOne(Log_deleted_request::class);
    }
    public function message()
    {
        return $this->HasMany(Message::class);
    }
    public function user_setting()
    {
        return $this->HasMany(User_setting::class);
    }
}
