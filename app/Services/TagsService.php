<?php

namespace App\Services;

use App\Repositories\TagsRepository;

class TagsService {

    private $tagsRepository;
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository=$tagsRepository;
    }

    public function tag($name)
    {
     return   $this->tagsRepository->tag($name);
    }

    public function tags()
    {
     return   $this->tagsRepository->tags();
    
    }

    public function ArticlesOfTag($name)
    {
     return  $this->tagsRepository->ArticlesOfTag($name);
    }
}