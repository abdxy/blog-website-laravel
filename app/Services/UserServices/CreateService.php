<?php



    namespace App\Services\UserServices;

    use App\Repositories\UserRepository;
    
    class CreateService {
    
        private $userRepository;
    
        public function __construct(UserRepository $userRepository)
        {
            $this->userRepository = $userRepository;
        }
    
    public function create($request)
    {
        $imageName = str_random(32) . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('img/users-photos/'), $imageName);
        $request->avatar_file = $imageName;
        return $this->userRepository->create($request);
    }
    
    }