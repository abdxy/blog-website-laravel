<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $connection = 'test';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
        'id', 'name',  'status'
    ];

    protected $casts = [
        'id'=>'integer', 'name'=>'string',  'status'=>'string'
    ];

    protected $dates=[];



}
