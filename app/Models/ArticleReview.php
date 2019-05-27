<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class ArticleReview extends Model
{

    protected $table = 'article_reviewss';
    protected $connection = 'mysql';
    protected $attributes = [
        'rating' => 0,
        'request_status'=>"new",'status'=>'rejected'
    ];
  
    protected $fillable = [
         'article_id', 'user_id', 'supervisor_id', 'request_status'
        , 'notes', 'status', 'accepted_at', 'rejected_at'
    ];

    protected $casts = [
        'id'=>'integer', 'article_id'=>'integer', 'user_id'=>'integer'
        , 'supervisor_id'=>'integer', 'request_status'=>'string'
        , 'notes'='integer', 'status'=>'string', 'accepted_at'=>'datetime:Y-m-d', 'rejected_at'=>'datetime:Y-m-d'
    ];

    protected $dates=['accepted_at','rejected_at'];

    public function User()
    {
        return $this->belongTo(App\User::class);
    }

    public function Article()
    {
        return $this->belongTo(Article::class);
    }
    public function reviewer()
    {
        return $this->hasOne(Admin::class);
    }

}
