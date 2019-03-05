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
		$firebase 		  = (new Factory)
                        ->withServiceAccount($serviceAccount)
                        ->withDatabaseUri('https://qurannlife-5698f.firebaseio.com')
                        ->create();
		$database 		= $firebase->getDatabase();
		$newPost 		  = $database
		                    ->getReference('blog/posts')
		                    ->push(['title' => 'Post title','body' => 'This should probably be longer.']);
		echo"<pre>";
		print_r($newPost->getvalue());
	}
}