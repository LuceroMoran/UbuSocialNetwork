<?php

Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');


Route::get('/', function () {
    return view('welcome');
});



Route::get('/feed' ,['middleware' =>'itson', function(){
  return view('feed');
}]);
Route::post('sendregister','RegisterController@register');
Route::post('access','LoginController@login');
Route::post('getusrdata','GetUserData@getPData');
Route::post('sendaNew','PostOwnController@postaNew');
Route::post('getmyPost','PostOwnController@getmyPost');
Route::get('/my_profile' ,['middleware' =>'itson', function(){
  return view('own_profile');
}]);




Route::group(['middleware' => ['web']], function () {
    //
});
