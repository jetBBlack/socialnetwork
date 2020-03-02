<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

  
    return view('welcome');
});



Auth::routes();

Route::group(['middleware'=>'auth'], function () {

   Route::get('/profile/{slug}', 'ProfileController@index');
   Route::get('/home', 'PostsController@index')->name('home');
   Route::get('/changePhoto', function(){
   	return view('profile.pic');
   });
   Route::post('/uploadPhoto','ProfileController@uploadPhoto');
   Route::get('/findFriends','ProfileController@findFriends');
   Route::post('/updateProfile','ProfileController@updateProfile' );
   Route::get('/editProfile','ProfileController@editProfile');
   Route::get('/addFriend/{id}','ProfileController@sendRequest');
   Route::get('/requests', 'ProfileController@request');
   Route::get('/accept/{id}', 'ProfileController@accept');
   Route::post('/post', 'PostsController@addPost');
   Route::get('/friends', 'ProfileController@friends');
   Route::get('/messages', 'ChatsController@index');
   Route::get('/message/{id}', 'ChatsController@getMessage')->name('message');
   Route::post('message', 'ChatsController@sendMessage');
   
   


});

Route::get('/logout', 'Auth\LoginController@logout');





