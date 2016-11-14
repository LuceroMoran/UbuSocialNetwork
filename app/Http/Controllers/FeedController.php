<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class FeedController extends Controller
{
    public function get_post_follows(){
      session_start();
      $follows = DB::table('suscribciones')->select('suscripcion_id')
      ->where('suscriptor_id','=',$_SESSION['uid'])->get();
      foreach ($follows as $numero => $valor) {
      $personas[$numero] = $follows[$numero]->suscripcion_id;
      }
      $personas[] = $_SESSION['uid'];

      $getpost = DB::table('posts')
      ->join('users','posts.id_user','=','users.id')
      ->join('user-data','users.id','=','user-data.user_id')
      ->join('users as MU','posts.mencion','=','MU.id')
      ->select('posts.id_user','posts.mencion','users.name','posts.text', 'posts.id','user-data.profile_picture',
        'MU.name as mname','MU.email as memail','posts.likes','users.email')
      ->whereIn('posts.id_user',$personas)
      ->orderBy('posts.created_at','desc')->get();

      return $getpost;
    }

    public function postCode(){
      session_start();
      $titulo = Request::input('titulo');
      $codigo = Request::input('codigo');
      $sintaxis = Request::input('sintaxis');

        $insertar = DB::table('post-codigos')->insert([
          'user_id' => $_SESSION['uid'],
          'codigo' => $codigo,
          'sintaxis' => $sintaxis,
          'titulo' => $titulo,
        ]);
        return 200;}


    public function get_info(){
      session_start();
      $profile = $_SESSION['uid'];
      $getinfo = DB::table('users')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('users.name','users.email','users.id','user-data.profile_picture',
      'user-data.profile_cover','user-data.Twitter'
      )->where('users.id','=',$profile)->get();
       return $getinfo;
    }

    public function get_codes(){
      session_start();
      $follows = DB::table('suscribciones')->select('suscripcion_id')
      ->where('suscriptor_id','=',$_SESSION['uid'])->get();
      foreach ($follows as $numero => $valor) {
      $personas[$numero] = $follows[$numero]->suscripcion_id;
      }


      $code_post = DB::table('post-codigos')
      ->join('users','post-codigos.user_id','=','users.id')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('post-codigos.id','post-codigos.sintaxis','post-codigos.titulo',
      'users.name','users.email','user-data.profile_picture','post-codigos.user_id'
      )->whereIn('post-codigos.user_id',$personas)
      ->orderBy('post-codigos.id','desc')->get();
      return $code_post;
    }
}
