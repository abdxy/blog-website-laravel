@extends('layout')
@section('content')
<div class="title">create new article</div>

<form action="/articles" method="post" enctype="multipart/form-data">
  @csrf
  <div class="field">
      <div class="control">
          <label for="title" class="label">title:</label>
          <input type="text" class="input"  name="title">
      </div></div>
      <div class="field">
          <div class="control">
              <label for="desc" class="label">description:</label>
              <input type="input" class="input"  name="description" >
          </div></div>
    <div class="field">
            <div class="control">
                <label for="content" class="label">content:</label>
            <textarea class="textarea"   name="content" ></textarea>
            </div></div>
            <div class="field">
                <div class="control">
                    <label for="categories" class="label">categories:</label>
                    
                  @foreach ($categories as $cateogry)
 
                <label class="checkbox">
                    <input type="checkbox"  name="categories[]" value="{{$cateogry->name}}">
                    {{$cateogry->name}}
                  </label>
                  @endforeach
                </select>
              </div> </div>
              <div class="field">
                  <div class="control">
                      <label for="cover" class="label">cover:</label>
                      <input type="file" class="file" id="name" name="cover1"  accept="image/*">
                  </div></div>
            <div class="field">
                <div class="control">
                    <label for="tags" class="label">tags:</label>
                    <input type="input" class="input"  name="tags" placeholder="games,ninja,android">
                </div></div>
                
    
      
    <div class="field">
            <div class="control">
              <button type="submit" class="button is-link">Create</button>
            </div>
          
          </div>
</form>    

@endsection