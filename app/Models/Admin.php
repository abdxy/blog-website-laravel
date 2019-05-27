<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Admin extends  Authenticatable
{
    use Notifiable;
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    protected $guard="admin";

    protected $attributes = [
        'status' => "active",
        'avatar'=>"default_avatar.jpg"
    ];
  
    protected $fillable = [
        'full_name', 'avatar', 'country_id', 'type', 'status'
        , 'username', 'email', 'password'
    ];
     
    protected $casts = [
        'id'=>'integer','full_name'=>'string', 'avatar'=>'string', 'country_id'='integer'
        , 'type'='string', 'status'='string'
        , 'username'='string', 'email'='string', 'password'='string'
    ];
    protected $dates=[];
    public function country()
    {
        return  $this->hasOne(Country::class);
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function logs()
    {
        return  $this->hasMany(AdminsLog::class);
    }
}
