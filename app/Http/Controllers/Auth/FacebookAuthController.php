<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    protected $redirectPath = '/currencies';

    public function redirectToProvider(Request $request)
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('email', $userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);
        } else {
            $user = new User();
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt('password');
            $user->save();
            Auth::login($user);
        }
        return redirect($this->redirectPath);
    }
}