<?php

    use App\Http\Controllers\UrlController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */
    require __DIR__ . '/auth.php';
    Route::group(['middleware' => ['web']], function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
    });
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/privacy-policy', function () {
        return view('pages.privacy-policy');
    })->name('privacy');

    Route::name('url.')->group(function () {
        Route::get('{url}', [UrlController::class, 'getUrl'])
            ->name('get');
    });

