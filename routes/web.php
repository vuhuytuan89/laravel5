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
// URL
Route::get('url/full', function() {
	return URL::full();
	//http://localhost/laravel5/public/url/full
});
Route::get('linkCss', function() {
	//return asset('layout/style.css'); // use http://
	return asset('layout/style.css', true); // use https://
});

Route::group(['middleware' => ['web'], 'prefix' => 'admincp'], function() {
	//Dashboard Route
	Route::get('dashboard', function() {
		//return view();
	});
	Route::get('login', function() {
		//return view();
	});
});

Route::get('admin/login', function() {
	return view('admin.login');
});
Route::get('admin/home', function() {
	return view('admin.master');
});