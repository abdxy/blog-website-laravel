<?php
namespace App\Repositories;

use App\models\Tag;

class TagsRepository
{

    private $tagModel;

    public function __construct(Tag $tagModel)
    {
        $this->tagModel = $tagModel;
    }

    public function create($data)
    {
        $tag=new $this->tagModel;
        $tag->name=$data;
        $tag->numbers_of_articles=1;
        $tag->save();
        return $tag;

    }



    public function update($data)
    {
        $tag = $this->tagModel::where("name", $data)->first();
            $tag->numbers_of_articles++;
            $tag->save();
            return $tag;
    }

    public function exists($data)
    {
       return $this->tagModel::where("name", $data)->exists();
    }


    public function tags()
    {
        return $this->tagModel::all();
    }

    public function tag($data)
    {
        return  $this->tagModel::where('name', $data)->firstOrFail();
    }

    public function articlesOfTag($data)
    {
        return  $this->tagModel::where("name", $data)->first()->articles()->latest()->paginate(15);
    }
}
