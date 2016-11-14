<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;
class InfoController extends Controller
{
    public function get_my_info(){
      session_start();
      $userid = $_SESSION['uid'];
      $getinfo = DB::table('users')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('users.name','users.id','user-data.profile_picture',
      'user-data.profile_cover','user-data.Twitter','user-data.Facebook','user-data.Youtube'
      ,'user-data.fav-language'
      )->where('users.id','=',$userid)->get();
      return $getinfo;
    }

    public function get_followers(){
    	session_start();
    	$profile = $_SESSION['uid'];
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

    public function updateYoutube(){
      session_start();
      $url = Request::input('url');
      DB::table('user-data')->where('user_id','=',$_SESSION['uid'])
      ->update(
      [
        'Youtube' => $url,
      ]);

      return 200;
    }

    public function updateFacebook(){
      session_start();
      $url = Request::input('url');
      DB::table('user-data')->where('user_id','=',$_SESSION['uid'])
      ->update(
      [
        'Facebook' => $url,
      ]);

      return 200;
    }

    public function updateTwitter(){
      session_start();
      $url = Request::input('url');
      DB::table('user-data')->where('user_id','=',$_SESSION['uid'])
      ->update(
      [
        'Twitter' => $url,
      ]);

      return 200;
    }

    public function updateLenguaje(){
      session_start();
      $sintaxis = Request::input('sintaxis');
      DB::table('user-data')->where('user_id','=',$_SESSION['uid'])
      ->update(
      [
        'fav-language' => $sintaxis,
      ]);

      return $sintaxis;
    }


    public function getAllUsers()
    {
      $query = DB::table('users')->select('name','email')->get();
      $users = array();
      for($i = 0; $i < count($query) ; $i++)
     {
       foreach ($query[$i] as $key => $value) {
           $users[] = $value;
       }
     }
      return $users;
    }
}
