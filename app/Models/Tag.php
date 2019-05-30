<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Article;

class Tag extends Model
{   
    protected $table = 'tags';
    protected $connection = 'mysql';
    protected $attributes=['status'=>'active'];
    protected $fillable = [
            'name', 'status', 'numbers_of_articles'
        ,  'published_at', 'last_use_at'
    ];

    protected $casts = [
        'id'=>'integer', 'name'=>'string'
        , 'status'=>'string', 'numbers_of_articles'=>'integer'
        ,  'published_at'=>'timestamp', 'last_use_at'=>'timestamp'
    ];

    protected $dates=['last_use_at','published_at'];

   public function articles()
   {
       return $this->BelongsToMany(Article::class,TagsArticle::class);

   }


}
