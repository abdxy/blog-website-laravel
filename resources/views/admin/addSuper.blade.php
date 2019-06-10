@extends('layout')
@section('content')
<div class="card">
        <div class="card-content">
<h2 class="title"> add supervisor</h2>
<form method="POST" action="/dashboard/addsuper">
    @csrf
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
              <button class="button is-link">add</button>
            </div>
          
          </div>
   
</form> 
        </div>
</div>
@endsection