<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Services\PasswordService;
use App\Services\LoginService;


class AuthController extends Controller
{

    public function registerForm() {
        return view('auth.signup');
    }


    public function register(RegisterRequest $request): RedirectResponse
    {
        $role = $request->input('role', 'Member');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);
        return redirect('login')->with('success', 'Registration successful');

    }

    public function loginForm(){

        return view('auth.signin');
    }
    public function login(LoginRequest $request, LoginService $loginService): RedirectResponse
    {

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember_token');

        return $loginService->login($credentials, $remember);
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect('login')->with('logout', 'you logged out' );
    }

    public function newPassIndex() {
        return view('auth.newPassword');
    }

    public function editPassword(ChangePasswordRequest $request, PasswordService $passwordService, User $user)
    {
        $passwordService->editPassword($user, $request->password);
        return redirect('login')->with('success', 'password changed successfully');
    }
}
