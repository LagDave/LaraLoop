<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower(ucwords($value));
    }
    public function setEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }
}
