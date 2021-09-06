<?php


    namespace App\Repositories;


    use Illuminate\Database\Eloquent\Model;

    interface UserRepositoryInterface
    {
        /**
         * @param Integer $id
         * @return array
         */
        public function getUser(int $id): array;

        /**
         * @param array $user
         * @return array
         */
        public function create(array $user): array;
    }
