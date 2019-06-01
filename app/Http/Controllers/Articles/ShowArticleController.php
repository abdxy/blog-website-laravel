<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;

use App\Services\Articles\ShowService;

class ShowArticleController extends Controller{

    private $showArticleService;

    public function __construct(ShowService $showArticleService)
    {
        $this->showArticleService = $showArticleService;
    }

    public function show($slug)
    {   
        $article=$this->showArticleService->getbyslug($slug);


        return  view('Articles.article',['article'=>$article]);
    }
}