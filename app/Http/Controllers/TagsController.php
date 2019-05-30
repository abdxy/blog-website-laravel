<?php
namespace App\Http\Controllers;

use App\Services\TagsService;

class tagscontroller extends Controller{

    private $tagsService;

    public function __construct(TagsService $tagsService)
    {
       $this->tagsService=$tagsService;
    }

    public function index()
    {  
        $tags = $this->tagsService->tags();

        return view("tags",["tags"=>$tags]);
    }

    public function show($name)
    {
        $tag = $this->tagsService->tag($name);

        $articles=$this->tagsService->ArticlesOfTag($name);

        return view("tag",["tag"=>$tag,"articles"=>$articles]);
    }

}