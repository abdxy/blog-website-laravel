<?php

namespace App\Services;

use App\Repositories\TagsRepository;

class TagsService {

    private $tagsRepository;
    public function __construct(TagsRepository $tagsRepository)
    {
        $this->tagsRepository=$tagsRepository;
    }

    public function create($tags,$article)
    {
        tags = explode(",", $tags);
        $tags = array_unique($tags);

        foreach ($tags as $tag) {
            $tag_return=null;
            if ( $this->tagsRepository->exists($tag)) {
                $tag_return=$this->tagsRepository->update($tag);
               }
               $tag_return=$this->tagsRepository->create($tag);
            $tag_return = $this->tagsRepository->create($tag);
            $article->tags()->attach($tag_return->id);
        }
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