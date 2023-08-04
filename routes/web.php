<?php

use App\Http\Controllers\Error\ErrorController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'guest'], function () {
// Login routes
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLogin');
    Route::post('/login', [UserController::class, 'login'])->name('login');

// Registration routes
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegistration');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/panel', [UserController::class, 'panel'])->name('panel');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/error', [ErrorController::class, 'error'])->name('error');
        Route::post('/error/show', [ErrorController::class, 'find'])->name('errorFind');
    });
});

Route::get('/home', function () {
    return view('welcome');
});

