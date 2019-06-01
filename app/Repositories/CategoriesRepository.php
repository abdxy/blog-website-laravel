<?php
namespace App\Repositories;


use App\models\Category;

class CategoriesRepository{

    private $categoryModel; 

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel=$categoryModel;
    }

    public function create($data)
    {
        return $category=new $this->categoryModel;
        $category->name=$data;
        $category->save();
        return $category;
    }

    public function categories()
    {
        return $this->categoryModel::all();
    }

    public function increase($data)
    {
        $data->numbers_of_articles++;
        $data->save();
    }

    public function category($data)
    {
        return  $this->categoryModel::where('name',$data)->firstOrFail();
    }

    public function ArticlesOfCategory($data)
    {
        return  $this->categoryModel::where("name",$data)->first()->articles()->latest()->paginate(15);
    }


}