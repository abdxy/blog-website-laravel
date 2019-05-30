<?php
namespace App\Repositories;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository
{
    private $articleModel;

    public function __construct(Article $articleModel)
    {
        $this->articleModel=$articleModel;
    }


    public function create($data)
    {

        return $this->articleModel->create($data);
   
    }

    public function all()
    {

        return $this->articleModel->latest()->paginate(15);
    }

    public function getBySlug($slug)
    {
      return $this->articleModel->where('slug',$slug)->firstOrFail();
    }

    public function update($id, $data)
    {
        $article = $this->articleModel->findorfail($id);
        $article->update($data);
        return $article->save();
    }

    public function userArticles($id)
    {
        return $this->articleModel->where("user_id", "$id")->latest()->paginate(15);
    }

}
