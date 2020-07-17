<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name','username', 'email', 'password','no_tlp','profile_image',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}