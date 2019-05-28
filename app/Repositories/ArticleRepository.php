<?php
namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{

    public function getModel()
    {
        return new Article;
    }

    public function all()
    {
        $artical = $this->getModel();
        return $artical->paginate(15);
    }

    public function getBySlug($slug)
    {
      return Article::where('slug',$slug)->first();
    }

    public function update($id, $data)
    {
        $article = Article::find($id);
        $article->update($data);
        return $article->save();
    }

    public function userArticles($id)
    {
        return Article::where("user_id", "$id")->paginate(15);
    }

}
