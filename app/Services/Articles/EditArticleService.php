<?php
namespace App\Services\Articles;

use App\Repositories\ArticleRepository;

class EditArticleService {

    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function update($data,$id)
    {   
        $imageName = "default.png";
        if (isset($data->cover1)) {
            $imageName = str_random(32) . '.' . $data->cover1->getClientOriginalExtension();
            $data->cover1->move(public_path('img/articles-covers/'), $imageName);
        }
        $data->request->add([
            "cover" => $imageName

        ]);

       return $this->articleRepository->update($id,$data);
    }

    public function getByID($id)
    {       
     return   $this->articleRepository->getByID($id);
    }





}