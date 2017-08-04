<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        \Auth::login($user);

        return redirect()->intended('/'); 
    }
	
	public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();   
    }   

    public function callbackGoogle(SocialAccountService $service)
    {
        $user = $service->createOrGetUserGoogle(Socialite::driver('google')->user());

        \Auth::login($user);

        return redirect()->intended('/'); 
    }
}
