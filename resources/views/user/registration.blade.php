@extends('layout')
@section('content')
<div class="card">
        <div class="card-content">
<h2 class="title">Register</h2>
<form method="POST" action="/register" enctype="multipart/form-data">
    @csrf
    <div class="field">
    <div class="control">
        <label for="name" class="label">full Name:</label>
        <input type="text" class="input"name="full_name">
    </div></div>
    <div class="field">
            <div class="control">
                <label for="username" class="label">Name:</label>
                <input type="text" class="input"name="username">
            </div></div>
            <div class="field">
                    <div class="control">
                        <label for="name" class="label">your photo:</label>
                        <input type="file" class="file" id="name" name="avatar"  accept="image/*">
                    </div></div>
                    <div class="field">
                            <div class="control">
                                    <label for="select" class="label">country:</label>
                                    <div class="select">
                                        
                                            <select name="country">
                                              @foreach ($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                  
                                              @endforeach
                                            </select>
                                          </div>
                            </div></div>
                            <div class="field">
                            <div class="control">
                                    <label for="phone" class="label">phone:</label>
                                    <input type="phone" class="input"name="phone">
                                </div></div>
                                <div class="field">
                                <div class="control">
                                        <label for="website" class="label">website:</label>
                                        <input type="url" class="input"name="website">
                                    </div></div>

    <div class="field">
    <div class="control">
        <label for="email" class="label">Email:</label>
        <input type="email" class="input" id="email" name="email">
    </div></div>

    <div class="field">
    <div class="control">
        <label for="password" class="label">Password:</label>
        <input type="password" class="input" id="password" name="password">
    </div></div>

    <div class="field">
            <div class="control">
              <button class="button is-link">Submit</button>
            </div>
          
          </div>
   
</form> 
        </div>
</div>
@include('error')
@endsection