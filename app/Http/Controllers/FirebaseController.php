<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
	public function index(){
		$serviceAccount = ServiceAccount::fromJsonFile(base_path().'/app/Http/Controllers/qurannlife-5698f-firebase-adminsdk-5zf8h-50190a8f49.json');
		$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://qurannlife-5698f.firebaseio.com')->create();
		$database = $firebase->getDatabase();
        //$newPost = $database->getReference('users/1')->push(['userinfo' => 'userinfo', 'usershare' => 'dfdsf']);
        $newPost = $database->getReference('users/1/userinfo')->push(['name' => 'Talha']);
		echo"<pre>";
		print_r($newPost->getvalue());
	}

	/* get data */
	public function getuser($user){
		
		$serviceAccount = ServiceAccount::fromJsonFile(base_path().'/app/Http/Controllers/qurannlife-5698f-firebase-adminsdk-5zf8h-50190a8f49.json');
		$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://qurannlife-5698f.firebaseio.com')->create();

		$database = $firebase->getDatabase();
		$reference = $database->getReference('users/'.$user->id)->getValue();

		if(!empty($reference)):
			return $reference;
		else:
			return '';	
		endif;
	}

	/* save update */
	public function saveuser($user){

		$serviceAccount = ServiceAccount::fromJsonFile(base_path().'/app/Http/Controllers/qurannlife-5698f-firebase-adminsdk-5zf8h-50190a8f49.json');
		$firebase = (new Factory)->withServiceAccount($serviceAccount)->withDatabaseUri('https://qurannlife-5698f.firebaseio.com')->create();

		$database = $firebase->getDatabase();
		$reference = $database->getReference('users/'.$user->id);

		$userdata = [
			'token' => $user->token,
			'refreshToken' => $user->refreshToken,
			'expiresIn' => $user->expiresIn,
			'id' => $user->id,
			'nickname' => $user->nickname,
			'name' => $user->name,
			'email' => $user->email,
			'avatar' => $user->avatar,
			'user' => [
				'name' => $user->user['name'],
				'email' => $user->user['email'],
				'id' => $user->user['id'],
			],
			'avatar_original' => $user->avatar_original,
			'profileUrl' => $user->profileUrl,
		];

		$value = $reference->push($userdata);	
		$nodekey = $value->getKey();

		$addeduser = $database->getReference('users/'.$user->id)->getValue();
		if(!empty($addeduser)):
			return $addeduser;
		else:
			return '';	
		endif;
		
	}

}