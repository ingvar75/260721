<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(static function () {
    Route::get('register', fn () => view('guest.register'));
    Route::get('login', fn () => view('guest.login'))->name('login');

    Route::post('register', [GuestController::class, 'register']);
    Route::post('login', [GuestController::class, 'login']);
});

Route::middleware('auth')->group(static function () {
    Route::get('/', [IndexController::class, 'index'])->name('home');
    Route::get('profile/view', fn () => view('welcome'))->name('profile');
    Route::post('rooms/create', [RoomsController::class, 'create'])->name('createRoom');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
