<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use DB;


class RegisterController extends Controller
{
    public function register(){
      $nombre = Request::input('nombre');
      $password = Request::input('password');
      $email = Request::input('email');
      $password = md5($password);

      $validar = DB::table('users')->select('id')->where('email','=',$email)->get();
      if($validar != null){
        $codigo = 202;
      }else{
        $newuser = DB::table('users')->insert([
          'name' => $nombre,
          'password' => $password,
          'email' => $email
        ]);
            $codigo = 0;
      }

      return $codigo;
    }
}
