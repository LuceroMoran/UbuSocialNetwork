<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use DB;

class PostsController extends Controller
{
    public function post_a_post(){
      session_start();
      $userid = $_SESSION['uid'];
      $texto = Request::input('post');
      $postinsert = DB::table('posts')->insert(
      ['id_user' =>$userid,'text' => $texto]
      );
      return 201;
    }

    public function get_my_post(){
    $userid = Request::input('id');
    $getpost = DB::table('posts')
    ->join('users','posts.id_user','=','users.id')
    ->join('user-data','users.id','=','user-data.user_id')
    ->select('posts.id_user','posts.mencion','users.name','posts.text','user-data.profile_picture')
    ->where('posts.id_user','=',$userid)->orWhere('posts.mencion', '=',$userid)
    ->orderBy('posts.created_at','desc')->take(4)->get();
    return $getpost;
    }
}
