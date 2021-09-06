<?php

    namespace App\Providers;

    use App\Repositories\UrlRepository;
    use App\Repositories\UrlRepositoryInterface;
    use App\Repositories\UserRepository;
    use App\Repositories\UserRepositoryInterface;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\ServiceProvider;

    class RepositoryServiceProvider extends ServiceProvider
    {
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            $this->app->bind(UrlRepositoryInterface::class, UrlRepository::class);
            $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        }

        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
        }
    }
