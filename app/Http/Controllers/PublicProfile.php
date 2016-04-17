<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use DB;


class PublicProfile extends Controller
{
 

	public function getView($email){
		session_start();
		$getprofileid = DB::table('users')->select('id','name')->where('email','=',$email)->get();
		if($getprofileid != null){
		   $_SESSION['publicprofileid'] = $getprofileid[0]->id;
			return view('user_public_perfil');
			// return $profile_id;
		}
	}

	public function get_public_post(){
	session_start();
	$profile = $_SESSION['publicprofileid'];
    $getpost = DB::table('posts')
    ->join('users','posts.id_user','=','users.id')
    ->join('user-data','users.id','=','user-data.user_id')
    ->select('posts.id_user','posts.created_at','users.name','posts.text','user-data.profile_picture')
    ->where('posts.id_user','=',$profile)->orderBy('posts.created_at','desc')->take(10)->get();
    return $getpost;
    }

    public function get_public_info(){
    	session_start();
    	$profile = $_SESSION['publicprofileid'];
    	$getinfo = DB::table('users')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('users.name','users.id','user-data.profile_picture',
      'user-data.profile_cover','user-data.Twitter'
      )->where('users.id','=',$profile)->get();
     	
     	 return $getinfo;

    }

    public function do_follow(){
    	session_start();
    	$user_id = $_SESSION['uid'];
    	$profile = $_SESSION['publicprofileid'];
    	DB::table('suscribciones')->insert([
    		'suscriptor_id' => $user_id,
    		'suscripcion_id' => $profile,
    		]);
    	return 0;
    }

    public function follow_validate(){
    	session_start();
    	$codigo = 204;
    	$user_id = $_SESSION['uid'];
    	$profile = $_SESSION['publicprofileid'];
    	$validate = DB::table('suscribciones')
    	->where('suscriptor_id','=',$user_id)
    	->where('suscripcion_id','=',$profile)
    	->get();

    	if($validate != null){
    		$codigo = 208;
    	}

    	return $codigo;

    }
}
