@extends('layout')
@section('content')
<div class="title">edit profile</div>
<form action="/users/{{$user->id}}" method="post" enctype="multipart/form-data">

    @csrf
    
    @method("patch")

    <div class="field">
    <div class="control">
        <label for="name" class="label">full Name:</label>
    <input type="text" class="input"name="full_name" value="{{$user->full_name}}">
    </div></div>
    <div class="field">
            <div class="control">
                <label for="password" class="label">Password:</label>
                <input type="password" class="input" id="password" name="password">
            </div></div>
            <div class="field">
                    <div class="control">
                        <label for="name" class="label">your photo:</label>
                        <input type="file" class="file" id="name" name="avatar"  accept="image/*">
                    </div></div>
                    <div class="field">
                            <div class="control">
                              <button class="button is-link">edit</button>
                            </div>
                          
                          </div>

</form>



@endsection