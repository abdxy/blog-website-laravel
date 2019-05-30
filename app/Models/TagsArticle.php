<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TagsArticle extends Pivot
{
  
    protected $table = 'tags_articles';
    protected $connection = 'mysql';

    protected $fillable = [
         'article_id', 'tag_id'
    ];

    protected $casts = [
        'id'=>'integer', 'article_id'=>'integer', 'tag_id'=>'integer'
    ];
    
    protected $dates=[];


}
