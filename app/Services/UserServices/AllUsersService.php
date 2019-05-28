<?php

namespace App\Services\UserServices;

use App\Repositories\UserRepository;

class AllUSersService
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function allUsers()
    {
        return  $this->userRepository->all();
    }
}
