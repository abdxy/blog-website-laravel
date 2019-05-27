<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Articles\AllArticlesService;
use App\Services\Articles\ShowArticleService;

class IndexController extends Controller
{

    private $allArticlesService;


    public function __construct(AllArticlesService $allArticlesService)
    {
        $this->allArticlesService = $allArticlesService;

    }

    public function index()
    {

        return  view('home', ['articles' => $this->allArticlesService->allArticles()]);
    }
}
