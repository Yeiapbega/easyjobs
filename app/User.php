<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "auth";
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fsname', 'email', 'password', 'slname', 'flname', 'phone', 'dni', 'dataPermission', 'remember_token', 'rol_id', 'ApiToken', 'social_id', 'provider', 'dataComplete', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'ApiToken'
    ];
}
