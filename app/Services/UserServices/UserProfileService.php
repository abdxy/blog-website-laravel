<?php

namespace App\Services\UserServices;

use App\Repositories\UserRepository;

class UserProfileService {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

public function User($name)
{
    return $this->userRepository->getByName($name);
}

}