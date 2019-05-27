<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{   
    protected $table = 'request_logs';
    protected $connection = 'mysql';

    protected $fillable = [
        'article_reviews_id', 'supervisor_id', 'notes', 'accepted_at'
        , 'rejected_at'
    ];

    protected $casts = [
        'id'=>'integer', 'article_reviews_id'=>'integer'
        , 'supervisor_id'=>'integer', 'notes'=>'integer', 'accepted_at'=>'datetime:Y-m-d'
        , 'rejected_at'=>'datetime:Y-m-d'
    ];

    protected $dates=['accepted_at','rejected_at'];

    public function reviewer()
    {
        $this->belongsTo(Admin::class);
    }

    public function Article()
    {
        return $this->belongTo(Article::class);
    }

}
