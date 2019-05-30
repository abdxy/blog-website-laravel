<?php
namespace App\Http\Controllers;

use App\Services\CategoriesService;

class Categoriescontroller extends Controller{

    private $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
       $this->categoriesService=$categoriesService;
    }

    public function index()
    {  
        $categories = $this->categoriesService->Categories();

        return view("categories",["categories"=>$categories]);
    }

    public function show($name)
    {
        $category = $this->categoriesService->category($name);

        $articles=$this->categoriesService->ArticlesOfCategory($name);

        return view("category",["category"=>$category,"articles"=>$articles]);
    }

}