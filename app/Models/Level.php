<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    protected $connection = 'mysql';
    protected $fillable = [
        'name', 'lower_bound', 'upper_bound'
    ];

    protected $casts = [
        'id'=>'integer', 'name'=>'string', 'lower_bound'=>'integer', 'upper_bound'=>'integer'
    ];

    protected $dates=[];


}
