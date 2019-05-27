<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:user', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('user.user_login');
    }
    
    public function login(Request $request)
    {

      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      
        return redirect()->intended(route('user.profile'));
      } 

      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}