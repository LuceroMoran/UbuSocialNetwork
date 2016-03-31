<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;
class InfoController extends Controller
{
    public function get_my_info(){
      $userid = Request::input('id');
      $getinfo = DB::table('users')
      ->join('user-data','users.id','=','user-data.user_id')
      ->select('users.name','users.id','user-data.profile_picture',
      'user-data.profile_cover','user-data.Twitter'
      )->where('users.id','=',$userid)->get();
      return $getinfo;
    }
}
