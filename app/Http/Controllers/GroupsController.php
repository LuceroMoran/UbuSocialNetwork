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
        return view('grupo');
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

    function getData(){
      session_start();
      $data = array(
        "group_id" => [],
    		"group_name" => [],
        "group_type" => [],
        "group_privacy" => [],
        "created_by" => []
        );

    	$id = $_SESSION['publicprofileid'];
      $getData = DB::table('groups')
      ->select('groups.id')
      ->where('groups.created_by', '=',  $id)
      ->orderBy('groups.created_at', 'desc')->take(1)->get();
      $data['group_id'] = $getData;

      return $data;
    }

    function addMember(){
      $group_id = Request::input('group_id');
      $member_id = Request::input('memeber_id');
      $privilege = Request::input('privilege');
      $create = DB::table('groups_members')->insert([
        'group_id' => $group_id,
        'member_id' => $member_id,
        'admin' => $privilege,
        ]);
        return 0;
    }

    /*function updateMember(){
    }*/
}
