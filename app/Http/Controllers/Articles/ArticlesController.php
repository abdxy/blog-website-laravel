<?php
namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Articles\CreateArticleService;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller{
    
     private $createArticleService;
    public function __construct(CreateArticleService $createArticleService)
    {
        $this->createArticleService = $createArticleService;
        
    }

    public function create()
    {
        return view("articles.create",["categories"=>["games","life"]]);
    }

    public function store(Request $request)
    {  // dd($request);
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

}