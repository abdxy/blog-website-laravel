<?php

namespace App\Services\UserServices;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ProfileService {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

public function User($name)
{
    return $this->userRepository->getByName($name);
}

public function getByid($id)
{
    return $this->userRepository->getById($id);
}


public function update($id,$data)
{   
    $data->avatar_file=Auth::user()->avatar;

    if(isset($data->avatar)){

    $imageName = str_random(32) . '.' . $data->avatar->getClientOriginalExtension();
    $data->avatar->move(public_path('img/users-photos/'), $imageName);
    $data->avatar_file = $imageName;
    
    }
    
    return $this->userRepository->update($id,$data);
}

}