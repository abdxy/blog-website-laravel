@extends('layout')
@section('content')


<div class="container card">
        <div class="section">
                <article class="media">
                        <figure class="media-left">
                          <p class="image is-128x128">
                            <img src={{"/img/users-photos/".$user->avatar}}>
                          </p>
                        </figure>
                        <div class="media-content">
                          <div class="content">
                            <p>
                            <div class="title">" {{strtoupper($user->full_name)}} "</div>
                            </p>
                        <div class="subtitle">level :{{$user->level->name}}</div>
                        
                   

                          </div>
                          

                        </div>
      
                      </article>
                      
                      
    
                      <div class="row columns is-multiline">
                            @foreach ($articles=$user->articles()->paginate(15) as $article)
                            <div class="column is-one-third">
                             <div class="card">
                                 <div class="card-image">
                                   <figure class="image is-4by3">
                                     <img src={{"/img/articles-covers/".$article->cover}} >
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
                                     <div class="datetime">{{ $article->published_at->format("y-m-d-h")}}</div>

                                  </div>
                                  
                               </div>
                           </div>
                          
                            @endforeach
                           </div>
                           {{ $articles->links() }}
        </div>
    </div>

    @include('error')
@endsection