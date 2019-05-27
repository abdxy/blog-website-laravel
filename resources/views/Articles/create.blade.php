@extends('layout')
@section('content')
<div class="title">create new article</div>

<form action="/articles/create" method="post">
  @csrf
  <div class="field">
      <div class="control">
          <label for="title" class="label">title:</label>
          <input type="text" class="input"  name="title">
      </div></div>
      <div class="field">
          <div class="control">
              <label for="desc" class="label">description:</label>
              <input type="input" class="input"  name="desc" >
          </div></div>
    <div class="field">
            <div class="control">
                <label for="content" class="label">content:</label>
                <textarea class="textarea"   name="content" ></textarea>
            </div></div>
            <div class="field">
                <div class="control">
                    <label for="categories" class="label">categories:</label>
            <div class="select" name="categories">
                <select>
                  <option>option</option>
                  <option>With options</option>
                  <option>With options</option>
                </select>
              </div> </div></div>
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