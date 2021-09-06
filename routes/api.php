<?php

    use App\Http\Controllers\UrlController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */
    Route::group(['prefix' => 'url', 'as' => 'url'], function () {
        Route::post('create', [UrlController::class, 'setUrl']);
    });

    Route::group(['prefix' => 'auth', 'as' => 'auth'], function () {
        Route::post('/register', [UserController::class, 'create'])
            ->name('register.post');

        Route::post('/login', [UserController::class, 'login'])
            ->name('login.post');

        Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
    });
