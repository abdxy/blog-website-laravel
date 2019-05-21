<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    protected $connection = 'test';
    protected $attributes = [
        'rating' => 0,
        'status' => "underReview"
    ];

    protected $fillable = [
        'id', 'user_id', 'title', 'slug', 'description', 'content', 'cover'
        , 'rating', 'category_id', 'status', 'published_at', 'last_rejected_at'
       
    ];

    protected $casts = [
        'id'=>'integer', 'user_id'=>'integer', 'title'=>'string'
        , 'slug'=>'string', 'description'=>'string', 'content'=>'text', 'cover'=>'string'
        , 'rating'=>'integer', 'category_id'=>'integer', 'status'=>'string',
         'published_at'=>'timestamp', 'last_rejected_at'=>'timestamp'
       
    ];

    protected $dates=['published_at','last_rejected_at'];

    public function belongTo()
    {
        return $this->belongTo(App\User::class);
    }

    public function categories()
    {
        return $this->hasMany(CategoriesArticle::class);
    }
    public function review()
    {
        return $this->hasOne(review::class);
    }
}
