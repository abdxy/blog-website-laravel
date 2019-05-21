<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesArticle extends Model
{
    protected $table = 'categories_article';
    protected $connection = 'test';
  
    protected $fillable = [
        'id', 'article_id', 'category_id'
    ];

    protected $casts = [
        'id'=>'integer', 'article_id'=>'integer', 'category_id'=>'integer'
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }

    public function category()
    {
        return  $this->belongsToMany(AdminsLog::class);
    }
}
