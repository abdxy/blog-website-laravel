<?php


namespace App\Services\Articles;


use App\Repositories\ArticleRepository;


class ShowService{

    private $articleRepository;


    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    
    }

    public function getByslug($slug)
    {
       return $this->articleRepository->getByslug($slug);
    }

 

}