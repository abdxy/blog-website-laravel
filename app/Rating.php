<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $connection = 'test';
    protected $fillable = [
        'id', 'article_id', 'guest_id', 'rate'
    ];

    protected $casts = [
      'id'=>'integer', 'article_id'=>'integer', 'guest_id'=>'integer'
      , 'rate'=>'integer'
  ];

  protected $dates=[];

    public function article()
    {
       return $this->belongsTo(Article::class);
    }
    public function guest()
    {
      //  
    }

}
