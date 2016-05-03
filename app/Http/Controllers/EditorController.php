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
}
