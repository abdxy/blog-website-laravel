<?php
namespace App\Services\Articles;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TagsRepository;
use App\Repositories\CategoriesRepository;

class CreateArticleService
{

    private $articleRepository;
    private $tagsRepository;
    private $categoriesRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        TagsRepository $tagsRepository,
        CategoriesRepository $categoriesRepository
    ) {
        $this->articleRepository = $articleRepository;
        $this->tagsRepository = $tagsRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function create(Request $request)
    {
        $imageName = "default.png";
        if (isset($request->cover1)) {
            $imageName = str_random(32) . '.' . $request->cover1->getClientOriginalExtension();
            $request->cover1->move(public_path('img/articles-covers/'), $imageName);
        }
        $request->request->add([
            "status" => "accepted", "cover" => $imageName,
            "published_at" => now(), "user_id" => Auth::user()->id
        ]);


        $article = $this->articleRepository->create($request->except(["categories", 'tags', "_token", 'cover1']));
        $this->createTags($request->tags, $article);
        $this->Pivet($request->categories, $article);
    }

    public function createTags($tags, $article)
    {
        $tags = explode(",", $tags);
        $tags = array_unique($tags);
        foreach ($tags as $tag) {

            $tag_return = $this->tagsRepository->create($tag);
            $article->tags()->attach($tag_return->id);
        }
    }

    public function Pivet($categories, $article)
    {

        foreach ($categories as $category) {
            $category = $this->categoriesRepository->category($category);
            if ( $category != null) {
                $this->categoriesRepository->increase($category);
                $article->categories()->attach($category->id);
            }
        }
    }
}
