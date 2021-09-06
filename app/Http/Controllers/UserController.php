<?php


    namespace App\Http\Controllers;


    use App\Http\Requests\Auth\LoginRequest;
    use App\Http\Requests\UserRegisterRequest;
    use App\Services\UserService;
    use Illuminate\Http\Request;

    class UserController extends Controller
    {
        /**
         * @var UserService
         */
        private UserService $userService;

        public function __construct(UserService $userService)
        {
            $this->userService = $userService;
        }

        public function create(UserRegisterRequest $request)
        {
            return $this->userService->create($request->all());
        }

        public function login(LoginRequest $request)
        {
            return $this->userService->login($request);
        }

        public function logout(Request $request)
        {
            $this->userService->logout($request);
        }
    }
