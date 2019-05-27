<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{   
    protected $table = 'categories_article';
    protected $connection = 'mysql';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
        'slug', 'name', 'status', 'numbers_of_articles'
        ,  'published_at', 'last_use_at'
    ];

    protected $casts = [
        'id'=>'integer', 'slug'=>'string', 'name'=>'string'
        , 'status'=>'string', 'numbers_of_articles'=>'integer'
        ,  'published_at'=>'timestamp', 'last_use_at'=>'timestamp'
    ];

    protected $dates=['last_use_at','published_at'];

   public function articles()
   {
       return $this->hasMany(TagsArticle::class);

   }

}
