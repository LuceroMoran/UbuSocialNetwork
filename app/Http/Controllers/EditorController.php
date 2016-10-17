<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class EditorController extends Controller
{
  public function getView($id){
    session_start();
    $get_code = DB::table('post-codigos')->where('id','=',$id)->get();
    if($get_code != null){
      $_SESSION['code_id'] = $id;
      return view('code_view');
    }
  }

  public function getInfo(){
    session_start();
    $code_id = $_SESSION['code_id'];
    $get_code = DB::table('post-codigos')->where('id','=',$code_id)->get();
    return $get_code;
  }
  public function getCodeText(){
    session_start();
    $code_id = Request::input('id');
    $get_code = DB::table('post-codigos')->where('id','=',$code_id)->get();
    return $get_code;
  }

  public function post_comment(){
    session_start();
    $comentario = Request::input('comentario');
    $post = DB::table('comentarios-codigos')
    ->insert([
      'user_id' => $_SESSION['uid'],
      'codigo_id' => $_SESSION['code_id'],
      'comentario' => $comentario,
    ]);

    return 200;
  }

  public function get_comments(){
    session_start();
    $get_comment = DB::table('comentarios-codigos')
    ->join('users','comentarios-codigos.user_id','=','users.id')
    ->join('user-data','users.id','=','user-data.user_id')
    ->select('users.name','user-data.profile_picture','comentarios-codigos.comentario','comentarios-codigos.codigo_id')
    ->where('comentarios-codigos.codigo_id','=',$_SESSION['code_id'])
    ->orderBy('comentarios-codigos.id','desc')
    ->get();
    return $get_comment;
  }

  public function related_codes(){
    session_start();
    $id_publicador = DB::table('post-codigos')->select('user_id')
    ->where('id','=',$_SESSION['code_id'])->get();
    $codigos = DB::table('post-codigos')->where('user_id','=',$id_publicador[0]->user_id)->get();
    return $codigos;
  }
}
