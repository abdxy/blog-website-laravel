@extends('layout')

@section('content')
<div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img src={{"/img/articles-covers/".$article->cover}} >
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
        
          
          <p class="title is-4">{{$article->title}}</p>
          <br>
          <div class="subtitle">{{$article->category}}</div>
        </div>
      </div>
  
      <div class="content">
        {{$article->content}}

      </div>
      <div class="datetime">{{ $article->published_at->ago()}}</div>
      <a href="{{route("user.profile",["name"=>$article->user->username])}}">{{$article->user->username}}</a>
      <br><br><br>
      <div> 
          Tags :
          @foreach ($article->tags as $tag)
        <a href="/tags/{{$tag->name}}">#{{$tag->name}}</a>{{$loop->last?"":","}}
          @endforeach
        </div>
        <br>
        <div>
            Categories :
            @foreach ($article->categories as $category)
          <a href="/categories/{{$category->name}}">{{$category->name}}</a>{{$loop->last?"":","}}
            @endforeach
          </div>
    </div>
   
  </div>
  <br>
  @can('update', $article)
  <a class="button is-primary" href="/articles/{{$article->id}}/edit">edit</a>  
  @endcan

@endsection