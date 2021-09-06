<?php

    namespace App\Services;

    use App\Http\Requests\Auth\LoginRequest;
    use App\Models\User;
    use App\Providers\RouteServiceProvider;
    use App\Repositories\UserRepositoryInterface;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class UserService
    {
        /** @var UserRepositoryInterface */
        private UserRepositoryInterface $userRepository;

        /**
         * UserService constructor.
         * @param UserRepositoryInterface $userRepository
         */
        public function __construct(UserRepositoryInterface $userRepository)
        {
            $this->userRepository = $userRepository;
        }

        /**
         * @param int $id
         * @return array
         */
        public function get(int $id): array
        {
            return $this->userRepository->getUser($id);
        }

        /**
         * @param array $user
         * @return array
         */
        public function create(array $user): array
        {
            return $this->userRepository->create($user);
        }


        /**
         * Handle an incoming authentication request.
         *
         * @param \App\Http\Requests\Auth\LoginRequest $request
         * @return array
         */
        public function login(LoginRequest $request)
        {
            if (Auth::attempt(["email" => $request->email, "password" => $request->password], $request->rememberMe)) {
                $success = true;
                $message = 'User login successfully';
            } else {
                $success = false;
                $message = 'Unauthorised';
            }
            return ['success' => $success, 'message' => $message];
        }

        /**
         * Destroy an authenticated session.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function logout(Request $request)
        {
            Auth::guard('web')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    }
