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
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::name('url.')->group(function () {
    Route::get('{url}', [UrlController::class, 'getUrl'])->name('get');
    Route::post('/url/shortener', [UrlController::class, 'setUrl'])->name('set');
});
