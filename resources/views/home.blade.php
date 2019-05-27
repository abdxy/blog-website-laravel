@extends('layout')
@section('content')
<div class="container card">
    <div class="section">


        <div class="row columns is-multiline">
           @foreach ($articles as $article)
           <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src={{"/img/".$article->cover}} >
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                    <a class="title is-4" href="{{route("article.show",['slug'=>$article->slug])}}">{{$article->title}}</a>
                    </div>
                  </div>
              
                <div class="content">{{$article->description}}</div>
         

                    <br>
                    <div class="datetime">{{ $article->published_at->format("y-m-d-h")}}</div>
                <a href="#">{{$article->user->full_name}}</a>
                 </div>
              </div>
          </div>
         
           @endforeach
          </div>
    </div>
</div>
    
@endsection