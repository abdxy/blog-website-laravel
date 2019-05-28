<?php
namespace App\Http\Controllers\Users;

use App\Services\UserServices\UserProfileService;
use App\Services\CountriesService;
use App\Services\UserServices\CreateUserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userProfileService;
    private $countriesService;
    private $createUserService;

    public function __construct(
        UserProfileService $userProfileService,
        CountriesService $countriesService,
        CreateUserService $createUserService
    ) {
        $this->countriesService = $countriesService;
        $this->userProfileService = $userProfileService;
        $this->createUserService = $createUserService;
    }
    public function showProfile($name)
    {
        $user = $this->userProfileService->user($name);

        return view("user.profile", ['user' => $user]);
    }

    public function register()
    {
        $countries = $this->countriesService->all();
        return view('user.registration', ["countries" => $countries]);
    }

    public function store(Request $request)
    {
 
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'avatar' => 'max:2048',
            'country'=>'required'
          

        ]);

        $user=$this->createUserService->create($request);

        Auth::login($user);

        return redirect(route('user.profile',["name"=>$user->name]));
    }
}
