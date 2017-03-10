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


Route::get('user/profile', [
	'as' => 'profile',
	'uses' => 'UserController@showProfile'
	]);
// tham số bắt buộc
Route::get('user/{id}', function ($id) {
	return 'User '.$id;
});
// định nghĩa nhiều tham số

// dấu hỏi sau tham số: có nghĩa là tham số đó có thể có hoặc k. (không bắt buộc)
Route::get('posts/{post}/comments/{comment?}', function ($postId, $commentId=null) {
    return $postId .'='. $commentId;
});
// Ràng buộc
Route::get('name/{name}', function ($name) {
	return 'Name = '.$name;
})->where('name', '[A-Za-z]+');
Route::get('userid/{id}', function ($id) {
	return 'ID= '. $id;
}); //->where('id', '[0-9]+');

//route group



Route::group(['prefix' => 'admin'], function () {
    Route::get('users', function ()    {
        // Matches The "/admin/users" URL
        return 'prefix_admin';
    });
});