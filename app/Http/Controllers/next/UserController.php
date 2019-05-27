<?php

namespace App\Http\Controllers;



class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user')->except(["index"]);
    }
    public function index()
    {
        return view("user.profile");
    }
}
