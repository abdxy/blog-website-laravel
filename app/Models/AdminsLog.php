<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class AdminsLog extends Model
{

  protected $table = 'admins_logs';
  protected $connection = 'mysql';


  protected $fillable = [
    'admin_id', 'ip', 'country', 'machine_type', 'os', 'singin_at', 'singout_at', 'last_activity'
  ];

  protected $casts = [
    'id' => 'integer', 'admin_id' => 'integer', 'ip' => 'string', 
    'country' => 'string', 'machine_type' => 'string', 'os' => 'string', 
    'singin_at' => 'timestamp', 'singout_at' => 'timestamp', 'last_activity' => 'timestamp'
  ];
 
  protected $dates = ["singin_at","singout_at","last_activity"];

  public function admin()
  {
    return  $this->belongsTo(Admin::class);
  }
}
