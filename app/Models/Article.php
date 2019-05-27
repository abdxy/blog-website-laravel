<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\models\User;

class Article extends Model
{

    protected $table = 'articles';
    protected $connection = 'mysql';
    protected $attributes = [
        'rating' => 0,
        'status' => "underReview"
    ];

    protected $fillable = [
        'user_id', 'title', 'slug', 'description', 'content', 'cover', 'rating', 'category_id', 'status', 'published_at', 'last_rejected_at'

    ];

    protected $casts = [
        'id' => 'integer', 'user_id' => 'integer', 'title' => 'string', 
        'slug' => 'string', 'description' => 'string', 'content' => 'text',
         'cover' => 'string', 'rating' => 'integer', 'category_id' => 'integer',
          'status' => 'string',
        'published_at' => 'datetime:Y-m-d', 'last_rejected_at' => 'datetime:Y-m-d'

    ];

        protected $dates = ['published_at', 'last_rejected_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
