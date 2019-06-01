<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSessionController extends Controller {

    public function loginpage()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {

      $this->validate($request, [

        'email'   => 'required|email|exists:users',
        'password' => 'required|min:3'
      ]);
      
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        return redirect()->intended(route('user.profile',["name"=>Auth::user()->username]));
      } 

      return redirect()->back()->withErrors("password or email are invalid");

    }
    
    public function logout()
    {

        Auth::logout();

        return redirect('/');
    }

}