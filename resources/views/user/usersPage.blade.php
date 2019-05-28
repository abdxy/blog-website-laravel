@extends('layout')
@section('content')

<div class="container card">
    <div class="section">
<div class="title">All Users</div>

        <div class="row columns is-multiline">
           @foreach ($Users as $user)
           <div class="column is-one-third">
            <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src={{"/img/users-photos/".$user->avatar}}>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                    <a class="title is-4" href="{{route("user.profile",['name'=>$user->username])}}">{{$user->username}}</a>
                    </div>
                  </div>
              
                <div class="content">
                        level:  {{ $user->level->name}}
                    <br>
                    country:    {{ $user->country->name}}
                
                </div>
         

                    <br>
                 </div>
              </div>
          </div>
         
           @endforeach
          </div>
          {{$Users->links()}}
    </div>
</div>

@endsection