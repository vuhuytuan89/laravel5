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

/*
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
Route::get('addProduct', function() {
	$product = new App\product();
	$product->name = "prodcut 1";
	$product->image = "abcde";
	$product->price = 1000;
	$product->save();
	echo "Add product ok";
});
Route::resource('Product','ProductController');

Route::get('demo', function(){
	return view('test.demo');
});
Route::get('demo2', function(){
	return view('test.demo2');
});
View::share('title', 'this is title');
View::composer(['test.demo2', 'test.demo'], function($view) {
	return $view->with('thongtin', 'Mr.Tuấn');
});
Route::get('check-view', function() {
	if (view()->exists('test.demo2')) {
		echo 'exists';
	} else {
		echo 'not exists';
	}
});
*/


Route::get('/', function () {
	//layout default
    return view('layouts.home');
});
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

//schema
Route::get('schema/create', function () {
	Schema::create('tbdemo', function($table) {
		$table->increments('id');
		$table->string('tenmonhoc');
		$table->integer('gia');
		$table->text('ghichu')->nullable();
		$table->timestamps();
	});
});

Route::get('schema/rename', function() {
	Schema::rename('tbdemo', 'tbmonhoc');
});
Route::get('schema/drop', function() {
	Schema::drop('tbdemo');
});
Route::get('schema/drop-exists', function() {
	Schema::dropIFExists('tbdemo');
});
Route::get('schema/chang-col-attr', function() {
	Schema::table('tbmonhoc', function ($table) {
		//chuyen 255->50 char
		$table->string('tenmonhoc', 50)->change();
	});
});
Route::get('schema/drop-col', function () {
	Schema::table('tbmonhoc', function ($table) {
		//$table->dropColumn('ghichu');
		$table->dropColumn(['tenmonhoc', 'gia']);
	});
});

//foreign keys
Route::get('schema/cate', function () {
	Schema::create('category', function ($table) {
		$table->increments('id');
		$table->string('name');
		$table->timestamps();
	});
});

Route::get('schema/product', function () {
	Schema::create('sanpham', function ($table) {
		$table->increments('id');
		$table->string('name');
		$table->integer('price');
		$table->integer('cat_id')->unsigned();
		$table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
		$table->timestamps();
	});
});


// migration

