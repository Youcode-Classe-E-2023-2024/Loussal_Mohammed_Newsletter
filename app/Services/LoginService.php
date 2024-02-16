<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class LoginService
{

    /**
     * @param array $credentials
     * @param bool $remember
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(array $credentials, bool $remember = false): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        if(Auth::attempt($credentials, $remember)) {
            $user = Auth::user();
            $rememberStatus = $remember ? 'remembered' : 'not remembered';

            return $user->role === 'Admin'
                ? redirect()->route('admin.index')->with('logged', 'admin logged successfully '.$rememberStatus)
                : redirect('/welcome')->with('logged', 'user logged successfully '.$rememberStatus);
        }
        return redirect()->route('login')->with('errorLogin', 'email or password is incorrect');
    }
}
