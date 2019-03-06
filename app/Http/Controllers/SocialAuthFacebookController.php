<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use App\Http\Controllers\FirebaseController;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(FirebaseController $firebase)
    {
        $user = Socialite::driver('facebook')->user();

        //get/save data into firebase
        $userdata = $firebase->getuser($user);
        // echo 'Start<pre>';
        // print_r($userdata);
        // die();

        if(!empty($userdata)):
            echo "user is logged in";
            die();
		else:
            $userdata = $firebase->saveuser($user);
            print_r($userdata);
        endif;
        die();
        //return redirect()->to('/');
    }
}