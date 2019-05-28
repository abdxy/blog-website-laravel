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
        </div>
      </div>
  
      <div class="content">
        {{$article->content}}
 
        
        <br>
        <div class="datetime">{{ $article->published_at->format("Y-m-d")}}</div>
      </div>
      <a href="{{route("user.profile",["name"=>$article->user->username])}}">{{$article->user->username}}</a>
    </div>
  </div>
@endsection