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

Route::get('query/select-all', function () {
	$data = DB::table('product')->get();
	echo "<pre>"; print_r($data);
});

Route::get('query/select-colunm', function () {
	$data = DB::table('product')->select('name', 'image')->where('id','4')->get();
	echo "<pre>"; print_r($data);
});

Route::get('query/where-or', function () {
	$data = DB::table('product')->select('name', 'image')->where('id','3')->orWhere('price', 1000)->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/where-and', function () {
	$data = DB::table('product')->select('name', 'image')->where('id','3')->Where('price', 8000)->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/order', function () {
	$data = DB::table('product')->orderBy('id', 'desc')->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/limit', function () {
	//offset & limit
	$data = DB::table('product')->orderBy('id', 'asc')->skip(2)->take(3)->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/between', function () {
	//offset & limit
	$data = DB::table('product')->whereBetween('id', [2,4])->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/notBetween', function () {
	//offset & limit
	$data = DB::table('product')->whereNotBetween('id', [2,4])->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/whereIn', function () {
	$data = DB::table('product')->whereIN('id', [2,3,4])->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/whereNotIn', function () {
	$data = DB::table('product')->whereNotIN('id', [2,3,4])->get();
	echo "<pre>"; print_r($data);
});
Route::get('query/count', function () {
	$data = DB::table('product')->count();
	echo "<pre>"; print_r($data);
});
Route::get('query/max', function () {
	// gia max nhat
	$data = DB::table('product')->min('price');
	//$data = DB::table('product')->max('price');
	echo "<pre>"; print_r($data);
});
// tính trung bình
Route::get('query/avg', function () {
	// gia max nhat
	$data = DB::table('product')->avg('id');
	echo "<pre>"; print_r($data);
});

Route::get('query/sum', function () {
	// gia max nhat
	$data = DB::table('product')->sum('id');
	echo "<pre>"; print_r($data);
});

/*
 * join
 */
// tạo table
Route::get('create_tableCateNew', function() {
	Schema::create('cat_news', function ($table) {
		$table->increments('id');
		$table->string('name');
		$table->timestamps();
	});
	Schema::create('news', function ($table) {
		$table->increments('id');
		$table->string('name');
		$table->integer('price');
		$table->integer('cat_id')->unsigned();
		$table->timestamps();
	});
});

Route::get('queryjoin', function () {
	$data = DB::table('news')->join('cat_news', 'news.cat_id', '=' , 'cat_news.id')->get();
	echo "<pre>"; print_r($data);
});

Route::get('queryjoin2', function () {
	$data = DB::table('sanpham')->join('category', 'sanpham.cat_id', '=' , 'category.id')->get();
	echo "<pre>"; print_r($data);
});

Route::get('queryInsert', function () {
	DB::table('product') -> insert([
		'name' => 'tivi sony',
		'image' => 'images',
		'price' => 100000
	]);
	echo "insert thanh cong";
});
Route::get('queryInsertMuti', function () {
	DB::table('product') -> insert([
		['name' => 'tivi sony', 'image' => 'images', 'price' => 100000 ],
		['name' => 'tivi panasonic', 'image' => 'images', 'price' => 200000 ],
		['name' => 'tivi samsug', 'image' => 'images', 'price' => 300000 ],
	]);
	echo "insert thanh cong";
});
// migration

Route::get('queryInsertGetID', function () {
	$id = DB::table('product') -> insertGetId([
		'name' => 'tivi sony',
		'image' => 'images',
		'price' => 100000
	]);
	echo "insert thanh cong".$id;
});

Route::get('queryUpdate', function () {
	DB::table('product')->where('id', 2) -> update(['name' => 'tivi lg', 'image' => 'images', 'price' => 100000 ]);
	echo "update thanh cong";
});

Route::get('queryDelete', function () {
	DB::table('product')->where('id', 16)-> delete();
	echo "Delete thanh cong";
});


//ORM

Route::get('model/select-all', function() {
	//$data = App\Product::all()->toArray();
	$data = App\Product::all()->toJson();
	echo "<pre>"; print_r($data);
});
Route::get('model/select-id', function() {
	$data = App\Product::find(1)->toArray();
	echo "<pre>"; print_r($data);
});

Route::get('model/where', function () {
	$data = App\Product::where('price',1000)->get()->toArray();
	echo "<pre>"; print_r($data);
});

Route::get('model/limit', function() {
	$data = App\Product::where('price', 1000)->take(1)->get()->toArray();
	echo "<pre>"; print_r($data);
});
Route::get('model/count', function () {
	$data = App\Product::where('price',1000)->count();
	echo "<pre>"; print_r($data);
});
Route::get('model/whereRaw', function () {
	// price = 1000 and id = 1
	$data = App\Product::whereRaw('price = ? AND id = ?', [1000,1])->select('name')->get()->toArray();
	echo "<pre>"; print_r($data);
});

Route::get('model/insert', function () {
	$product = new App\Product;
	$product->name = 'Quần dài';
	$product->price = "10000";
	$product->image = "images";
	$product->save();
	echo "finish";
});
Route::get('model/create', function () {
	$data  = array(
		'name'=>'Quần kaki 1', 
		'image' => 'image 123', 
		'price'=> 2000,
		'text' => '123'
		);
	App\Product::create($data);
	echo "finish";
});

Route::get('model/update', function () {
	$data = App\Product::find(2);
	$data->name = 'new name';
	$data->image = 'new image';
	$data->save();
	echo "finish";
});

Route::get('model/delete', function() {
	$data = App\Product::destroy(1);
	echo $data;
});

Route::get('relation/one-many-1', function () {
	$data = App\Product::find(2)->images()->get()->toArray();
	echo '<pre>'; var_dump($data);
});
Route::get('relation/one-many-2', function () {
	$data = App\Image::find(5)->product()->get()->toArray();
	echo '<pre>'; var_dump($data);
});

Route::get('relation/many-many-1', function () {
	$data = App\Car::find(1)->color()->get()->toArray();
	echo '<pre>'; var_dump($data);
});

Route::get('relation/many-many-2', function () {
	$data = App\Color::find(1)->car()->get()->toArray();
	echo '<pre>'; var_dump($data);
});