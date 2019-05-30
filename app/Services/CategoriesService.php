<?php

namespace App\Services;


use App\Repositories\CategoriesRepository;

class CategoriesService {

    private $categoriesRepository;
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository=$categoriesRepository;
    }

    public function category($name)
    {
     return   $this->categoriesRepository->category($name);
    }

    public function categories()
    {
     return   $this->categoriesRepository->categories();
    
    }

    public function ArticlesOfCategory($name)
    {
     return  $this->categoriesRepository->ArticlesOfCategory($name);
    }
}