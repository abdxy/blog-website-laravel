<?php
namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Services\Articles\CreateService;
use App\Services\Articles\EditService;

class ArticlesController extends Controller{
    
     private $createArticleService;
    private $editArticleService;

    public function __construct(CreateService $createArticleService,EditService $editArticleService)
    {
        $this->editArticleService = $editArticleService;
        $this->createArticleService = $createArticleService;
        
    }

    public function create()
    {
        return view("articles.create",["categories"=>["games","life"]]);
    }

    public function store(Request $request)
    {  
        $this->validate($request,
        [   "title"=>"required|max:255",
            "content"=>"required",
            "description"=>"required" ,
            "tags"=>"required|regex:/^([A-Za-z0-9]+,)*[A-Za-z0-9]+$/",
            "slug"=>"required|unique:articles|regex:/^([A-Za-z0-9]+-)*[A-Za-z0-9]+$/",
            'cover1' => 'max:2048'
        ]
        );

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

    public function update(Request $request,$id)
    {
        $this->validate($request,
        [   "title"=>"required|max:255",
            "content"=>"required",
            "description"=>"required",
            "slug"=>"required|regex:/^([A-Za-z0-9]+-)*[A-Za-z0-9]+$/",
            'cover1' => 'max:2048'
        ]
        );

        $article = $this->editArticleService->update($request,$id);

        return redirect( route("article.show",["slug"=>$article->slug]) );
    }

}