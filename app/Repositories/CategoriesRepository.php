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
        return $this->categoryModel::create(["name"=>$data]);
    }

    public function categories()
    {
        return $this->categoryModel::all();
    }

    public function increase($category)
    {
        $category->numbers_of_articles++;
        $category->save();
    }

    public function category($name)
    {
        return  $this->categoryModel::where('name',$name)->firstOrFail();
    }

    public function ArticlesOfCategory($name)
    {
        return  $this->categoryModel::where("name",$name)->first()->articles()->latest()->paginate(15);
    }


}