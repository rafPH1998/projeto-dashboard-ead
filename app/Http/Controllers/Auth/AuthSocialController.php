<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    public function loginSocial($driver)
    {
        Validator::validate(
            compact('driver'), ['driver' => 'required|in:github,google']
        );
        
        return Socialite::driver($driver)->redirect();
    }

    public function authSocial($driver)
    {
        $socialUser = Socialite::driver($driver)->user();

        $user = Admin::query()->firstOrCreate(['email' => $socialUser->email], [
            'name'     => $socialUser->name,
            'email'    => $socialUser->email,
            'password' => bcrypt(Str::random(10))
        ]);

        auth()->login($user);

        return redirect()->route('dashboard.index');
    }
    
}
