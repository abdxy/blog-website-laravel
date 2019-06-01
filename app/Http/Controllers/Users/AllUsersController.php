<?php
namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\Articles\AllService;

class AllUSersController extends Controller
{
    private $allUSersService;

    public function __construct(AllService $allUSersService)
    {
        $this->allUSersService = $allUSersService;
    }

    public function index()
    {
        $users = $this->allUSersService->allUsers();

        return view("user.usersPage", ['Users' => $users]);
    }
}
