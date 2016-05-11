<?php

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/my_profile',[function(){
  return view('user_perfil');
}]);
Route::get('/settings',[function(){
  return view('config');
}]);

Route::get('/publicprofile={email}','PublicProfile@getView');
Route::get('/codigo_id={id}','EditorController@getView');
Route::post('code_view/info','EditorController@getInfo');




Route::get('/feed' ,[function(){
  return view('feed');
}]);
Route::post('sendregister','RegisterController@register');
Route::post('access','LoginController@login');
Route::post('sendapost','PostsController@post_a_post');
Route::post('getmypost','PostsController@get_my_post');
Route::post('getmyinfo','InfoController@get_my_info');
Route::post('publicprofile/getposts','PublicProfile@get_public_post');
Route::post('publicprofile/getinfo','PublicProfile@get_public_info');
Route::post('publicprofile/follow','PublicProfile@do_follow');
Route::post('publicprofile/follow_validate','PublicProfile@follow_validate');
Route::post('publicprofile/getfollowers','PublicProfile@get_followers');
Route::post('publicprofile/post','PublicProfile@post_to_public');
Route::post('publicprofile/like','PublicProfile@addLike');
Route::post('group/create','GroupsController@addGroup');
Route::post('group/info','GroupsController@getData');
Route::post('group/new_member','GroupsController@addMember');
Route::post('postcode','PostsController@post_a_code');
Route::post('getMyFollowers','InfoController@get_followers');
Route::post('getMyPostCode','PostsController@get_my_codepost');
Route::post('editor/postComment','EditorController@post_comment');
Route::post('editor/getComment','EditorController@get_comments');
Route::post('public/getCodes','PublicProfile@get_codes');
Route::post('upload', 'UploadController@upload');
Route::post('feed/getPost','FeedController@get_post_follows');
Route::post('feed/info','FeedController@get_info');
Route::post('feed/codes','FeedController@get_codes');


Route::group(['middleware' => ['web']], function () {
    //
});
