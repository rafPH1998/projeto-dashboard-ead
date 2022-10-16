<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthGoogleController extends Controller
{
    public function loginGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function authGoogle()
    {
        $userGoogle = Socialite::driver('google')->user();

        $user = Admin::query()->firstOrCreate(['email' => $userGoogle->email], [
            'name'     => $userGoogle->name,
            'email'    => $userGoogle->email,
            'password' => bcrypt(Str::random(10))
        ]);
    
        auth()->login($user);
    
        return redirect()->route('dashboard.index');
    }

}
