<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\RegisterUserRequest;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {
        $login = $this->userService->login($request->only([
            'email',
            'password'
        ]));

        if (!$login) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        return redirect(route('panel'));
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $this->userService->store($request->only([
            'name',
            'email',
            'password'
        ]));

        return view('auth.login');
    }

    public function panel()
    {
        if (Gate::allows('accessAdminPanel', Auth::user())) {
            return view('admin.home.home');
        } else {
            return view('user.home.home');
        }
    }
}
