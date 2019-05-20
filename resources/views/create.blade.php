@extends('layout')
@section('content')
<form action="/quotes/create" method="post">
  @csrf
  <div class="field">
      <div class="control">
          <label for="author" class="label">author:</label>
          <input type="text" class="input"  name="author">
      </div></div>
    <div class="field">
            <div class="control">
                <label for="desc" class="label">Description:</label>
                <input type="textarea" class="textarea"  name="desc" required>
            </div></div>
            <div class="field">
                    <div class="control">   
<label class="checkbox">
        <input type="checkbox" name="private">
        private
      </label></div></div>
      
    <div class="field">
            <div class="control">
              <button type="submit" class="button is-link">Create</button>
            </div>
          
          </div>
</form>    
@include('error')
@endsection