@extends('layout')
@section('content')
<div class="title">Categories </div>
<div class="row columns is-multiline">
        
              @foreach ($categories as $category)
              <div class="column is-one-third">
              <div class="card">
                  <div class="card-content">
                    <div class="title">
                      <a href="/categories/{{$category->name}}">{{$category->name}}</a>
                    </div>
                    <br>
                    <div class="subtitle">
                     No.articles : {{$category->numbers_of_articles}}
                    </div>
                </div>
                </div>
            </div> 
              @endforeach
            
        </div>
@endsection