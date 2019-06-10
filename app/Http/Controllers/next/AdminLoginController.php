
<?php
namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
   
    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
      return view('admin.admin_login');
    }
    
    public function login(Request $request)
    {

      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:3'
      ]);
      
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      
        return redirect()->intended(route('admin.dashboard'));
      } 
      elseif(Auth::guard('supervisor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
     {
        return redirect()->intended(route('supervisor.dashboard'));
     }
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}