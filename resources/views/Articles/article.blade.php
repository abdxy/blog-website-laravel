@extends('layout')

@section('content')
<div class="card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img src={{"/img/".$article->cover}} >
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
      <a href="#">{{$article->user->full_name}}</a>
    </div>
  </div>
@endsection