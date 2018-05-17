<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'is_deleted',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notifications()
    {
        return $this->hasMany('App\Model\UserNotification');
    }

    public function roles()
    {
        return $this->belongsToMany("App\Models\Role");
    }

    public function followers()
    {
        return $this->hasMany('App\Models\Following', 'follower_id');
    }

    public function followees()
    {
        return $this->hasMany('App\Models\Following', 'followee_id');
    }
}
