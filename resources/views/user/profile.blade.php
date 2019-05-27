@extends('layout')
@section('content')
<div class="title">" {{strtoupper($user->full_name)}} "</div>
@if ($is_owner)
    
<div class="container" style="margin-bottom: 10px;">

<div class="field"><a href="#" class="button is-link">New Article</a></div>

</div>
@endif
<div class="container card">
        <div class="section">
    
    
            <div class="row columns is-multiline">
               @foreach ($quotes as $quote)

               
               <div class="column is-one-third">
                  <div class="card">
                      
                      <div class="card-content">
                          
                          <div class="content">
                              <p class="title">
                                  “{{$quote->desc}}”
                                </p>

                          </div>
                        <div class="subtitlt">― {{$quote->author}}</div>
                          <br>
                          <div class="datetime">{{ $quote->updated_at->format('d/m/Y')}}</div>
                      </div>@if ($is_owner)
                      <footer class="card-footer">
                          
                         <form action="/quotes/{{$quote->id}}/edit" method="get">
                             @csrf
                          
             
                        <button type="submit" class="button is-info ">Edit</button></form>
                        <form action="/quotes/{{$quote->id}}" method="post">
                                @csrf
                                @method("delete")
           
                        <button type="submit" class=" button is-danger ">Delete</button></form>
                      </footer>
                      @endif
                  </div>
              </div>

               @endforeach
              </div>
        </div>
    </div>
@endsection