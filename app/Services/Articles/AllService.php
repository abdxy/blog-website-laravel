<?php

namespace App\Services\Articles;

use App\Repositories\ArticleRepository;

class AllService
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    function allArticles()
    {
        return $this->articleRepository->all();
    }
}
