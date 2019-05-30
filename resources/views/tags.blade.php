@extends('layout')
@section('content')
<div class="title">Tags </div>
<div class="row columns is-multiline">
        
              @foreach ($tags as $tag)
              <div class="column is-one-third">
              <div class="card">
                  <div class="card-content">
                    <div class="title">
                      <a href="/tags/{{$tag->name}}">{{$tag->name}}</a>
                    </div>
                    <br>
                    <div class="subtitle">
                     No.articles : {{$tag->numbers_of_articles}}
                    </div>
                </div>
                </div>
            </div> 
              @endforeach
            
        </div>
@endsection