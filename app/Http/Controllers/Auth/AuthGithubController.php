<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthGithubController extends Controller
{
    public function loginGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function authGithub()
    {
        $userGithub = Socialite::driver('github')->user();

        $user = Admin::query()->firstOrCreate(['email' => $userGithub->email], [
            'name'     => $userGithub->name,
            'email'    => $userGithub->email,
            'password' => bcrypt(Str::random(10))
        ]);

        auth()->login($user);

        return redirect()->route('dashboard.index');
    }
    
}
