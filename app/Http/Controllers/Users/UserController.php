<?php
namespace App\Http\Controllers\Users;

use App\Services\CountriesService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UserServices\ProfileService;
use App\Services\UserServices\CreateService;
use App\Http\Requests\createUserRequest;

class UserController extends Controller
{
    private $userProfileService;
    private $countriesService;
    private $createUserService;

    public function __construct(
        ProfileService $userProfileService,
        CountriesService $countriesService,
        CreateService $createUserService
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

    public function store(createUserRequest $request)
    {
 
        $request->validated();

        $user=$this->createUserService->create($request);

        Auth::login($user);

        return redirect(route('user.profile',["name"=>$user->name]));
    }


    public function edit($id)
    {
        if(Auth::user()->id==$id){

            $user = $this->userProfileService->getByid($id);
            return view("user.edit",["user"=>$user]);
        }
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'avatar' => 'max:2048',
            "password"=> "max:3"
        ]);

        $this->userProfileService->update($id,$request);

        return redirect(route("user.profile",["name"=>Auth::user()->username]));
    }
}
