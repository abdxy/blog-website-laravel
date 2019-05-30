<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CategoriesArticle extends Model
{
    protected $table = 'categories_articles';
    protected $connection = 'mysql';
  
    protected $fillable = [
       'article_id', 'category_id'
    ];

    protected $casts = [
       'article_id'=>'integer', 'category_id'=>'integer'
    ];


}
