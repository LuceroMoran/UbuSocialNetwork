<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class GroupsController extends Controller
{
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
