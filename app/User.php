<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $table = 'users';
    protected $connection = 'test';
    protected $attributes = [
        'status' => "active",
        'avatar'=>"default_avatar.jpg"
    ];
  
    protected $fillable = [
        'full_name', 'avatar','website','phone', 'country_id'
        , 'type', 'status','social_account'
        ,'level_id','points'
        , 'username', 'email', 'password'
    ];

    public function country()
    {
        return  $this->hasOne(Country::class);
    }

    public function logs()
    {
        return  $this->hasMany(UsersLog::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'full_name'=>'string', 'avatar'=>'string'
        ,'website'=>'string','phone'=>'string', 'country_id'='integer'
        , 'type'=>'string', 'status'=>'string','social_account'=>'string'
        ,'level_id'=>'integer','points'=>'integer'
        , 'username'=>'string', 'email'=>'integer', 'password'=>'integer'
    ];
}
