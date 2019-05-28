<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Services\Articles\AllArticlesService;
use App\Services\Articles\ShowArticleService;
use App\Models\User;

class IndexController extends Controller
{

    private $allArticlesService;


    public function __construct(AllArticlesService $allArticlesService)
    {
        $this->allArticlesService = $allArticlesService;

    }

    public function index()
    {
        $guard = auth()->guard(); 
        $sessionName = $guard->getName(); 
        $parts = explode("_", $sessionName);
        unset($parts[count($parts)-1]);
        unset($parts[0]);
        $guardName = implode("_",$parts);
        //return $guardName;

        return  view('home', ['articles' => $this->allArticlesService->allArticles()]);
    }
}
