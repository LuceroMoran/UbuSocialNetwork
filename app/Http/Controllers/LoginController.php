<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class LoginController extends Controller
{
    public function login(){
      session_start();
      $email = Request::input('email');
      $password = Request::input('password');
      $password = md5($password);
      $check = DB::table('users')->select('id')
      ->where('email','=',$email)
      ->where('password','=',$password)
      ->get();
      if($check != null){
        $codigo = 200;
        $_SESSION['uid'] = $check[0]->id;
      }else{
        $codigo = 404;
      }
      return $codigo;
    }
}
