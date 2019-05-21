<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsArticle extends Model
{
  
    protected $table = 'tags_articles';
    protected $connection = 'test';

    protected $fillable = [
        'id', 'article_id', 'tag_id'
    ];

    protected $casts = [
        'id'=>'integer', 'article_id'=>'integer', 'tag_id'=>'integer'
    ];
    
    protected $dates=[];

    public function articles()
    {
        $this->belongsToMany(Article::class);
    }
    public function tags()
    {
        $this->belongsToMany(Tag::class);
    }

}
