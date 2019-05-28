<?php
namespace App\Http\Controllers\Users;

use App\Services\UserServices\AllUSersService;
use App\Http\Controllers\Controller;

class AllUSersController extends Controller{



    private $allUSersService;

    public function __construct(AllUSersService $allUSersService)
    {
        $this->allUSersService=$allUSersService;
        
    }


    public function index()
    {
        $users = $this->allUSersService->allUsers();

        return view("user.usersPage",['Users'=>$users]);
    }

}