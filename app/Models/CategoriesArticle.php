<?php
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CategoriesArticle extends Model
{
    protected $table = 'categories_article';
    protected $connection = 'mysql';
  
    protected $fillable = [
       'article_id', 'category_id'
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
