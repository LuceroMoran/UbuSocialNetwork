<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class GroupsController extends Controller
{

    public function getView($id){
      session_start();
      $get_group = DB::table('groups')->where('id','=',$id)->get();
      if($get_group != null){
        $_SESSION['group_id'] = $id;
        return view('beta-grupo');
      }
    }

    public function get_info(){
      session_start();
      $get_group = DB::table('groups')->where('id','=',$_SESSION['group_id'])->get();
      return $get_group;
    }

    public function get_members(){
      session_start();
      $get_members = DB::table('groups_members')
      ->join('users','groups_members.member_id','=','users.id')
      ->join('user-data','groups_members.member_id','=','user-data.user_id')
      ->select('users.name','users.id','users.email','user-data.profile_picture')
      ->where('groups_members.group_id','=',$_SESSION['group_id'])->get();
      return $get_members;
    }

    public function addGroup(){
      session_start();
      $name = Request::input('nombre');
      $asunto = Request::input('asunto');
      $insertar_grupo = DB::table('groups')->insertGetId([
        'name' => $name,
        'type' => $asunto,
        'created_by' => $_SESSION['uid'],
      ]);

      DB::table('groups_members')->insert([
        'group_id' => $insertar_grupo,
        'member_id' => $_SESSION['uid'],
        'admin' => 1,
      ]);

      return 200;
    }

    public function get_myGroups(){
      session_start();
      $misGrupos = DB::table('groups_members')
      ->join('groups','groups_members.group_id','=','groups.id')
      ->select('groups.name','groups_members.member_id','groups.id')
      ->where('member_id','=',$_SESSION['uid'])->get();

      return $misGrupos;
    }

    public function get_posts(){
      session_start();
      $publicaciones = DB::table('grupos-posts')
      ->join('users','grupos-posts.user_id','=','users.id')
      ->join('user-data','grupos-posts.user_id','=','user-data.user_id')
      ->select('grupos-posts.texto','grupos-posts.grupo_id','users.name','users.email','user-data.profile_picture')
      ->where('grupos-posts.grupo_id','=',$_SESSION['group_id'])
      ->get();
      return $publicaciones;
    }

    public function do_post(){
      session_start();
      $mensaje = Request::input('mensaje');
      $valida = DB::table('groups_members')->where('group_id', '=',$_SESSION['group_id'])
      ->where('member_id', '=',$_SESSION['uid'])->get();

      if($valida != null){
        $publicar = DB::table('grupos-posts')
        ->insert([
          'user_id' => $_SESSION['uid'],
          'texto' => $mensaje,
          'grupo_id' => $_SESSION['group_id'],
        ]);
        return 200;
      }

      return 404;
    }

    public function getNotas(){
      session_start();
      $notas = DB::table('grupos-notas')->select('nota','id')->where('grupo_id','=',$_SESSION['group_id'])->get();
      return $notas;
    }

    public function eliminarNota(){
      $id = Request::input('nota_id');
      DB::table('grupos-notas')->where('id','=',$id)->delete();
      return 400;
    }

    public function agregarNota(){
      session_start();
      $nota = Request::input('nota');
      $valida = DB::table('groups_members')->where('group_id', '=',$_SESSION['group_id'])
      ->where('member_id', '=',$_SESSION['uid'])->get();


      if($valida != null){
        $insertar = DB::table('grupos-notas')->insert([
          'user_id' => $_SESSION['uid'],
          'nota' => $nota,
          'grupo_id' => $_SESSION['group_id'],
        ]);
        return 200;
      }
      return 404;
    }

    public function postCode(){
      session_start();
      $titulo = Request::input('titulo');
      $codigo = Request::input('codigo');
      $sintaxis = Request::input('sintaxis');

      $valida = DB::table('groups_members')->where('group_id', '=',$_SESSION['group_id'])
      ->where('member_id', '=',$_SESSION['uid'])->get();

      if($valida != null){
        $insertar = DB::table('post-codigos')->insert([
          'user_id' => $_SESSION['uid'],
          'codigo' => $codigo,
          'sintaxis' => $sintaxis,
          'titulo' => $titulo,
          'grupo_id' => $_SESSION['group_id'],
        ]);
        return 200;
      }
      return 404;
    }

    public function getCodes(){
      session_start();

            $code_post = DB::table('post-codigos')
            ->join('users','post-codigos.user_id','=','users.id')
            ->join('user-data','users.id','=','user-data.user_id')
            ->select('post-codigos.id','post-codigos.sintaxis','post-codigos.titulo',
            'users.name','user-data.profile_picture','post-codigos.user_id','post-codigos.grupo_id'
            )->where('post-codigos.grupo_id',$_SESSION['group_id'])
            ->orderBy('post-codigos.id','desc')->get();

            return $code_post;
    }

    public function addMember(){
      session_start();
      $gid = $_SESSION['group_id'];
      $user = Request::input('usuario');
      $cuid = $_SESSION['uid'];
      $validar  = DB::table('users')->where('email',$user)->get();
      $cu = DB::table('groups_members')->where('member_id',$cuid)->where('admin',1)->where('group_id',$gid)->get();
      if ($cu != null) {
        if ($validar != null) {
          $iduser = $validar[0]->id;
          $existe = DB::table('groups_members')->where('member_id',$iduser)->where('group_id',$_SESSION['group_id'])->get();
          if($existe != null)
          {
            return 0101;
          }else{
            $insertar = DB::table('groups_members')->insert([
              'group_id' => $_SESSION['group_id'],
              'member_id' => $validar[0]->id,
            ]);
            return 200;
          }

        }
        else {
          return 404;
        }
      }
      else {

        return 111;
      }

    }

    public function deleteMember(){
      session_start();
      $cuid = $_SESSION['uid'];
      $id = Request::input('id');
      $gid = $_SESSION['group_id'];

      $select = DB::table('groups_members')->where('member_id',$cuid)->where('admin',1)->where('group_id',$gid)->get();
      if($select != null)
      {
        if($cuid == $id)
        {
          return 004;
        }else {
          $query = DB::table('groups_members')->where('member_id',$id)->where('group_id',$gid)->delete();
          return 0;
        }

      }else {
        return 1;
      }


    }

}
