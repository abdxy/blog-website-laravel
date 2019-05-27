<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $connection = 'mysql';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
        'name',  'status'
    ];

    protected $casts = [
        'id'=>'integer', 'name'=>'string',  'status'=>'string'
    ];

    protected $dates=[];



}
