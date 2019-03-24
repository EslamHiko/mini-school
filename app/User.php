<?php

namespace MiniSchool;

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
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // Mutator To Capitalize The First Character In The User Name
    public function setNameAttribute($value){
      $this->attributes['name'] = ucfirst($value);
    }
    // A User Has Many SocialProviders
    public function socialProviders(){
      return $this->hasMany(SocialProvider::class);
    }
}
