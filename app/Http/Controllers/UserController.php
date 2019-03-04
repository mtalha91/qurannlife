<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;

class UserController extends Controller
{
    /**
    * Redirect the user to the Facebook authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
    public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user();
 
        // $user = User::updateOrCreate(
        //     [
        //         'email' => $auth_user->email
        //     ],
        //     [
        //         'token' => $auth_user->token,
        //         'name'  =>  $auth_user->name
        //     ]
        // );
        dd($auth_user);
        //Auth::login($user, true);
        return redirect()->to('/'); // Redirect to a secure page 
        }
}
