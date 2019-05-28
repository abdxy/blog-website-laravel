<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Article;

class User extends Authenticatable
{
    use Notifiable;

    
    protected $table = 'users';
    protected $connection = 'mysql';
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
        return  $this->belongsTo(Country::class);
    }

    public function logs()
    {
        return  $this->hasMany(UsersLog::class);
    }

    public function articles()
    {
      return $this->hasMany(Article::class);
    }

    public function level()
    {
      return $this->belongsTo(Level::class);
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
        ,'website'=>'string','phone'=>'string', 'country_id'=>'integer'
        , 'status'=>'string','social_account'=>'string'
        ,'level_id'=>'integer','points'=>'integer'
        , 'username'=>'string', 'email'=>'integer',
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
