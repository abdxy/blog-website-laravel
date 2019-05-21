<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersLog extends Model
{
    protected $table = 'users_logs';
    protected $connection = 'test';
 
  
    protected $fillable = [
        'id', 'user_id', 'ip', 'country', 'machine_type'
        , 'os', 'singin_at', 'singout_at','last_activity'
    ];

    protected $casts = [
      'id'=>'integer', 'user_id'=>'integer', 'ip'=>'string'
      , 'country'=>'string', 'machine_type'=>'string'
      , 'os'=>'string', 'singin_at'=>'timestamp'
      , 'singout_at'=>'timestamp','last_activity'=>'timestamp'
  ];
   

  protected $dates=['singin_at','singout_at','last_activity'];

    public function user()
    {
      return  $this->belongsTo(User::class);
    }
}
