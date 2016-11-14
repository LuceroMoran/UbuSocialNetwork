<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class PostsController extends Controller
{
    public function post_a_post(){
      session_start();
      $userid = $_SESSION['uid'];
      $texto = Request::input('post');
      $postinsert = DB::table('posts')->insert(
      ['id_user' =>$userid,'text' => $texto,'mencion' => $userid]
      );
      return 201;
    }

    public function get_my_post(){
    $userid = Request::input('id');
    $getpost = DB::table('posts')
    ->join('users','posts.id_user','=','users.id')
    ->join('user-data','users.id','=','user-data.user_id')
    ->join('users as MU','posts.mencion','=','MU.id')
    ->select('posts.id_user','posts.mencion','users.name','posts.text','user-data.profile_picture',
      'MU.name as mname','posts.id','posts.likes')
    ->where('posts.id_user','=',$userid)->orWhere('posts.mencion', '=',$userid)
    ->orderBy('posts.created_at','desc')->take(5)->get();
    return $getpost;
    }

    public function post_a_code(){
      session_start();
      $userid = $_SESSION['uid'];
      $codigo = Request::input('codigo');
      $sintaxis = Request::input('sintaxis');
      $titulo = Request::input('titulo');
      $publicar = DB::table('post-codigos')->insert([
        'user_id' => $userid,
        'codigo' => $codigo,
        'sintaxis' => $sintaxis,
        'titulo' => $titulo,
      ]);

      return 200;
    }

    public function get_my_codepost(){
      session_start();
      $userid = $_SESSION['uid'];
      $code_post = DB::table('post-codigos')
      ->join('users','post-codigos.user_id','=','users.id')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('post-codigos.id','post-codigos.sintaxis','post-codigos.titulo',
      'users.name','user-data.profile_picture','post-codigos.user_id'
      )->where('post-codigos.user_id','=',$userid)
      ->orderBy('post-codigos.id','desc')->take(2)->get();
      return $code_post;
    }
}
