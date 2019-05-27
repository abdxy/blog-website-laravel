@extends('layout')
@section('content')
<form action="/quotes" method="post">
  @csrf
  @method("patch")
  <div class="field">
        <div class="control">
            <label for="author" class="label">author:</label>
        <input type="text" class="input"  name="author" value="{{$author}}">
        </div></div>
    <div class="field">
            <div class="control">
                <label for="email" class="label">Description:</label>

            <textarea name="desc" class="textarea" cols="30" rows="10">{{$desc}}</textarea>
            </div></div>
            <div class="field">
                    <div class="control">   
<label class="checkbox">
<input type="checkbox" name="private" {{$is_checked?"checked":""}} >
        private
      </label></div></div>
      
    <div class="field">
            <div class="control">
              <button type="submit" class="button is-link">edit</button>
            </div>
          
          </div>
          <input type="hidden" name="id" value={{$id}}>
</form>    
@include('error')
@endsection