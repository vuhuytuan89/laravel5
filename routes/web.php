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
Route::get('/', 'HomeController@index');

Route::get('/product', function () {
    return view('layouts.product');
});
Route::get('/news', function () {
    return view('layouts.news');
});
Route::get('/contact', function () {
    return view('layouts.contact');
});

Route::get('admincp/login', ['as' => 'getLogin', 'uses' => 'Admin\AdminLoginController@getLogin']);
Route::post('admincp/login', ['as' => 'postLogin', 'uses' => 'Admin\AdminLoginController@postLogin']);
Route::get('admincp/logout', ['as' => 'getLogout', 'uses' => 'Admin\AdminLoginController@getLogout']);


Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
	Route::get('/', 'AdminHomeController@index');
	//Route::controller('Users', 'UserController');
	Route::resource('user', 'AdminUserController');
    Route::resource('category', 'AdminCategoryController');
    Route::resource('product', 'AdminProductController');
    Route::post('uploadImg', 'AdminUploadController@postImages');
    Route::post('deleteImg', 'AdminUploadController@delImages');
    Route::get('test', 'AdminUploadController@test');
});
Auth::routes();
Route::get('/home', function() {
	return view('home');
});
Route::get('/admincp/upload', function () {
    return view('admin.product.upload');
});