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
  $data = array(
    "postinfo" => [],
    // "mencioninfo" => [],*
		"posts_ids" => []
    );

	$profile = $_SESSION['publicprofileid'];
    $getpost = DB::table('posts')
    ->join('users','posts.id_user','=','users.id')
    ->join('user-data','users.id','=','user-data.user_id')
    ->join('users as MU','posts.mencion','=','MU.id')
    ->select('posts.id_user','posts.mencion','users.name','posts.text', 'posts.id','user-data.profile_picture',
      'MU.name as mname')
    ->where('posts.id_user','=',$profile)->orWhere('posts.mencion', '=',$profile)
    ->orderBy('posts.created_at','desc')->take(10)->get();
		$getpids = DB::table('posts')
		->select('posts.id')
    ->where('posts.id_user','=',$profile)
    ->orderBy('posts.created_at','desc')->take(10)->get();
    $data['postinfo'] = $getpost;
		$data['posts_ids'] = $getpids;



/*    $getpostmencion = DB::table('posts')
    ->join('users','posts.mencion','=','users.id')
    ->select('posts.id_user','posts.mencion','users.name')
    ->where('posts.id_user','=',$profile)->orWhere('posts.mencion', '=',$profile)
    ->orderBy('posts.created_at','desc')->take(10)->get();
    $data['mencioninfo'] = $getpostmencion;*/

    return $data;
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

    	if($validate != null or $user_id == $profile){
    		$codigo = 208;
    	}

    	return $codigo;

    }

   public function get_followers(){
   	session_start();
   	$profile = $_SESSION['publicprofileid'];
   	$getfollowers = DB::table('suscribciones')
   	->join('users','suscribciones.suscriptor_id','=','users.id')
   	->join('user-data','users.id','=','user-data.user_id')
   	->select('users.id','users.name','users.email','suscribciones.suscriptor_id','suscribciones.suscripcion_id',
   		'user-data.profile_picture'
   		)
   	->where('suscribciones.suscripcion_id','=',$profile)
   	->get();
   	return $getfollowers;
   }

   public function post_to_public(){
    session_start();
      $user_id = $_SESSION['uid'];
      $profile = $_SESSION['publicprofileid'];
      $post = Request::input('post');

      $insertpost = DB::table('posts')->insert([
        'id_user' => $user_id,
        'mencion' => $profile,
        'text' => $post,
        ]);
      return 0;
   }

	 public function addLike(){
		 session_start();
		 $user_id = $_SESSION['uid'];
		 $post_id = Request::input('pid');
		 $like = DB::table('likes')->insert([
			 'post_id' =>$post_id,
			 'user_id' => $user_id,
		 ]);
		 return 201;
	 }
}
