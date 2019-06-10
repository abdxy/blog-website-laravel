<?php
namespace App\Services\Articles;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TagsRepository;
use App\Repositories\CategoriesRepository;
use App\Services\TagsService;

class CreateService
{

    private $articleRepository;
    private $tagsRepository;
    private $categoriesRepository;
    private $tagsService;

    public function __construct(
        TagsService $tagsService,
        ArticleRepository $articleRepository,
        TagsRepository $tagsRepository,
        CategoriesRepository $categoriesRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->tagsRepository = $tagsRepository;
        $this->categoriesRepository = $categoriesRepository;
        $this->tagsService = $tagsService;

    }

    public function create(Request $request)
    {
        $imageName = "default.png";
        if (isset($request->cover1)) {
            $imageName = str_random(32) . '.' . $request->cover1->getClientOriginalExtension();
            $request->cover1->move(public_path('img/articles-covers/'), $imageName);
        }

        $request->cover=$imageName;
        $request->user_id=Auth::user()->id;
  
        $article = $this->articleRepository->create($request);
        $this->tagsService->create($request->tags, $article);
        dd($request->categories);
        foreach ($request->categories as $category) {
            $category = $this->categoriesRepository->category($category);
            if ( $category != null) {
                $this->categoriesRepository->increase($category);
                $article->categories()->attach($category->id);
            }
        }
    }
}
