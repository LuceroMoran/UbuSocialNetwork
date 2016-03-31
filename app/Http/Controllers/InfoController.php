<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;
class InfoController extends Controller
{
    public function get_my_info(){
      $userid = Request::input('id');
      $getinfo = DB::table('users')->select('name')->where('id','=',$userid)->get();
      return $getinfo;
    }
}
