@extends('layout')
@section('content')
<div class="title">create new article</div>

<form action="/articles/{{$article->id}}" method="post" enctype="multipart/form-data">
  @csrf
  @method("patch")


  <div class="field">
      <div class="control">
          <label for="title" class="label">title:</label>
      <input type="text" class="input"  name="title" value="{{$article->title}}">
      </div></div>
      <div class="field">
          <div class="control">
              <label for="slug" class="label">slug:</label>
              <input type="text" class="input"  name="slug" value="{{$article->slug}}">
          </div></div>
      <div class="field">
          <div class="control">
              <label for="desc" class="label">description:</label>
              <input type="input" class="input"  name="description" value="{{$article->description}}">
          </div></div>
    <div class="field">
            <div class="control">
                <label for="content" class="label">content:</label>
                <textarea class="textarea"   name="content" >{{$article->content}}</textarea>
            </div></div>

              <div class="field">
                  <div class="control">
                      <label for="cover" class="label">new cover:</label>
                      <input type="file" class="file" id="name" name="cover1"  accept="image/*">
                  </div></div>
      
                
    
      
    <div class="field">
            <div class="control">
              <button type="submit" class="button is-link">edit</button>
            </div>
          
          </div>
</form>    

@endsection