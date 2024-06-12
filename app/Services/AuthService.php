<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public static function login(array $credentials = [])
    {
        if (!Auth::attempt($credentials)) {
            return false;
        }

        return User::findBy($credentials['email'], 'email');
    }

    public static function logout()
    {
        auth()->user()->tokens()->delete();
    }
}
