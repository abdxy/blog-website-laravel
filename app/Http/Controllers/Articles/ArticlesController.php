<?php
namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Services\Articles\CreateService;
use App\Services\Articles\EditService;
use App\Services\CategoriesService;
use App\Http\Requests\createArticleRequest;
use App\Http\Requests\updateArticleRequest;
use App\Models\Article;

class ArticlesController extends Controller{
    
    private $createArticleService;
    private $editArticleService;
    private $categoriesService;

    public function __construct(CreateService $createArticleService,
    EditService $editArticleService,
    CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
        $this->editArticleService = $editArticleService;
        $this->createArticleService = $createArticleService;
        
    }

    public function create()
    {
        $categories=$this->categoriesService->categories();
        return view("articles.create",["categories"=>$categories]);
    }

    public function store(createArticleRequest $request)
    {  
        $request->validated();

        $this->createArticleService->create($request);
        
        return redirect(route("user.profile",["name"=>Auth::user()->username]));
    }


    public function edit($id)
    {
        $article = $this->editArticleService->getByID($id);

        if($article!=null){

            if($article->user_id==Auth::user()->id)
            {
                return view("articles.edit",["article"=>$article]);
            }
        }
   
    }

    public function update(updateArticleRequest $request,Article $article)
    {

       $article = $this->editArticleService->update($request,$article->id);

        return redirect( route("article.show",["slug"=>$article->slug]) );
    }

}