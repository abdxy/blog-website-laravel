<?php
namespace App\Repositories;

use App\models\Tag;

class TagsRepository{

    private $tagModel; 

    public function __construct(Tag $tagModel)
    {
        $this->tagModel=$tagModel;
    }

    public function create($data)
    {
        if($this->tagModel::where("name",$data)->exists())
        {
            $tag=$this->tagModel::where("name",$data)->first();
            $tag->numbers_of_articles++;
            $tag->save();
            return $tag;  
        }
        return $this->tagModel::create(["name"=>$data,"numbers_of_artilces"=>1]);
    }

    public function tags()
    {
        return $this->tagModel::all();
    }

    public function tag($name)
    {
        return  $this->tagModel::where('name', $name)->firstOrFail();
    }

    public function ArticlesOfTag($name)
    {
        return  $this->tagModel::where("name",$name)->first()->articles()->latest()->paginate(15);
    }


}