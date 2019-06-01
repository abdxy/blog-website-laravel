<?php
namespace App\Repositories;

use App\Models\Article;


class ArticleRepository
{
    private $articleModel;

    public function __construct(Article $articleModel)
    {
        $this->articleModel=$articleModel;
    }

    public function create($data)
    {
    
        $article=new $this->articleModel;
        $article->title=$data->title;
        $article->slug=$data->slug;
        $article->content=$data->content;
        $article->description=$data->description;
        $article->cover=$data->cover;
        $article->status="accepted";
        $article->published_at=now();
        $article->user_id=$data->user_id;
        $article->save();
        return $article;
   
    }

    public function getByID($data)
    {
        return $this->articleModel->findOrFail($data);
    }

    public function all()
    {

        return $this->articleModel->latest()->paginate(15);
    }

    public function getBySlug($data)
    {
      return $this->articleModel->where('slug',$data)->firstOrFail();
    }

    public function update($id, $data)
    {  
        $article = $this->articleModel->findorfail($id);

            $article->title=$data->title;
            $article->slug=$data->slug;
            $article->content=$data->content;
            $article->description=$data->description;
            $article->cover=$data->cover;

         $article->save();

         return $article;
    }

    public function userArticles($data)
    {
        return $this->articleModel->where("user_id", $data)->latest()->paginate(15);
    }

}
