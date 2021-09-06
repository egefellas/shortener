<?php


    namespace App\Repositories;


    use App\Models\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;

    class UserRepository implements UserRepositoryInterface
    {

        public function getUser(int $id): array
        {
            $user = User::find($id);
            if (!$user) {
                return ['status' => 'fail', 'message' => 'These credentials do not match our records.'];
            }
            return ['status' => 'success', 'user' => $user->toArray()];
        }

        public function create(array $request): array
        {
            try {
                $user = new User();
                $user->name = $request['firstname'] . $request['lastname'];
                $user->email = $request['email'];
                $user->password = bcrypt($request['password']);
                $user->save();
                Auth::login($user);
                $success = true;
                $message = 'User register successfully';
            } catch (\Illuminate\Database\QueryException $ex) {
                $success = false;
                $message = $ex->getMessage();
            }

            // response
            return ['success' => $success, 'message' => $message];
        }

    }
