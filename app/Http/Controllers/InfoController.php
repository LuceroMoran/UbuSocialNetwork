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
      'user-data.profile_cover','user-data.Twitter'
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
}
