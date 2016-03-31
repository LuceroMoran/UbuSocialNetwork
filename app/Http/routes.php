<?php

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/my_profile',[function(){
  return view('user_perfil');
}]);
//
// Route::get('/feed' ,['middleware' =>'itson', function(){
//   return view('feed');
// }]);
Route::post('sendregister','RegisterController@register');
Route::post('access','LoginController@login');
Route::post('sendapost','PostsController@post_a_post');
Route::post('getmypost','PostsController@get_my_post');




Route::group(['middleware' => ['web']], function () {
    //
});
