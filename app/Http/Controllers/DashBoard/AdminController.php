<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\AddSuperVisor;

class AdminController extends Controller {
    
    private $addSuperVisor;

    public function __construct(AddSuperVisor $addSuperVisor)
    {
        $this->addSuperVisor = $addSuperVisor;
    }

    public function logInPage()
    {
        return view("admin.login");

    }

    public function login(Request $request)
    {

      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:3'
      ]);
      
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
      
        return redirect()->intended(route('admin.dashboard'));
      } 
      elseif(Auth::guard('supervisor')->attempt(['email' => $request->email, 'password' => $request->password]))
     {
        return redirect()->intended(route('supervisor.dashboard'));
     }
      return redirect()->back()->withErrors("email or password is invalid");
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function superDashBoard()
    {
        return view("admin.superdashboard");
    }

    public function addSuper()
    {
        return view("admin.addSuper");
    }

    public function storeSuper()
    {
        //
    }

   
}