<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{//unsignedinteger
   
    protected $table = 'categories';
    protected $connection = 'test';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
       'id', 'name', 'slug', 'cover', 'status', 'numbers_of_articles'
        , 'numbers_of_rating', 'published_at', 'last_add_at'
    ];

    protected $casts = [
     'id'=>'integer',   'name'=>'string', 'slug'=>'string', 'cover'=>'string'
     , 'status'=>'string', 'numbers_of_articles'=>'integer'
        , 'numbers_of_rating'=>'integer', 'published_at'=>'timestamp', 'last_add_at'=>'timestamp'
    ];

    protected $dates=['published_at','last_add_at'];

    public function articles()
    {
        return  $this->hasMany(CategoriesArticle::class);
    }



}
