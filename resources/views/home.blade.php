@extends('layout')
@section('content')


        <div class="row columns is-multiline">
           @foreach ($articles as $article)
           <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src={{"/img/articles-covers/".$article->cover}}>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                    <a class="title is-4" href="{{route("article.show",['slug'=>$article->slug])}}">{{$article->title}}</a>
                    </div>
                  </div>
              
                <div class="content" style="word-break: break-word;white-space: normal;">{{$article->description}}</div>
         

                    <br>
                    <div class="datetime">{{ $article->published_at->ago()}}</div>
                <a href="{{route("user.profile",["name"=>$article->user->username])}}">{{$article->user->username}}</a>
                 </div>
              </div>
          </div>
         
           @endforeach
          </div>
          {{ $articles->links() }}

@endsection