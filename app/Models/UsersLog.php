<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UsersLog extends Model
{
    protected $table = 'users_logs';
    protected $connection = 'mysql';
 
  
    protected $fillable = [
         'user_id', 'ip', 'country', 'machine_type'
        , 'os', 'singin_at', 'singout_at','last_activity'
    ];

    protected $casts = [
      'id'=>'integer', 'user_id'=>'integer', 'ip'=>'string'
      , 'country'=>'string', 'machine_type'=>'string'
      , 'os'=>'string', 'singin_at'=>'datetime:Y-m-d'
      , 'singout_at'=>'datetime:Y-m-d','last_activity'=>'datetime:Y-m-d'
  ];
   

  protected $dates=['singin_at','singout_at','last_activity'];

    public function user()
    {
      return  $this->belongsTo(User::class);
    }
}
