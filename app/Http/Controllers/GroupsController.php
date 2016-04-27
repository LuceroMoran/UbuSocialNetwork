<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    function addGroup(){
      session_start();
      $id = $_SESSION['publicprofileid']
      $groupName = Request::input('groupName');
      $privacy = Request::input('privacy');
      $create = DB::table('groups')->insert([
        'name' => $groupName,
        'privacy' => $privacy,
        'created_by' => $id
        ]);
        return 0;
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
