<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    protected $table = 'categories';
    protected $connection = 'mysql';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
        'name', 'slug', 'cover', 'status', 'numbers_of_articles'
        , 'numbers_of_rating', 'published_at', 'last_add_at'
    ];

    protected $casts = [
     'id'=>'integer',   'name'=>'string', 'slug'=>'string', 'cover'=>'string'
     , 'status'=>'string', 'numbers_of_articles'=>'integer'
        , 'numbers_of_rating'=>'integer', 'published_at'=>'datetime:Y-m-d', 'last_add_at'=>'datetime:Y-m-d'
    ];

    protected $dates=['published_at','last_add_at'];

    public function articles()
    {
        return  $this->hasMany(CategoriesArticle::class);
    }



}
