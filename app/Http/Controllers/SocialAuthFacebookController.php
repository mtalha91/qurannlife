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
    public function callback(FirebaseController $firebase, Request $request)
    {
        $user = Socialite::driver('facebook')->user();

        //get/save data into firebase
        $userdata = $firebase->getuser($user);
        // echo 'Start<pre>';
        // print_r($userdata);
        // die();

        if(!empty($userdata)):
            
            $userdata_ = '';
            foreach($userdata as $user):
                $userdata_ = $user;
                break;
            endforeach;
            
            // return redirect()->intended('success');

            //true if the item is present and is not null
            if ($request->session()->has('token')) {
                
            }else{
                $request->session()->put('token', $userdata_['token']);
                $request->session()->put('avatar', $userdata_['avatar']);
                $request->session()->put('name', $userdata_['name']);
                $request->session()->put('email', $userdata_['email']);
                $request->session()->put('authenticated', time());
            }
            // echo '<pre>';
            // print_r($userdata_);
            // //print_r($request);
            // echo "user is logged in";
            //die();
		else:
            $userdata = $firebase->saveuser($user);
            
            $userdata_ = '';
            foreach($userdata as $user):
                $userdata_ = $user;
                break;
            endforeach;
            $request->session()->put('token', $userdata_['token']);
            $request->session()->put('avatar', $userdata_['avatar']);
            $request->session()->put('name', $userdata_['name']);
            $request->session()->put('email', $userdata_['email']);
            $request->session()->put('authenticated', time());
            
            // return redirect('home/dashboard');
            //return redirect()->to('/');
            //print_r($userdata_);
        endif;
        //die();
        return redirect()->to('/');
    }
}