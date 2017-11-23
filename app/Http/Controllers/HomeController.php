<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // check login
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'Trang chủ';
        //$product = Product::all();
        $product = DB::table('products')
                        ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                        ->select('products.*', 'product_images.image_path')
                        ->get();
        $this->data['listProduct'] = $product;
        return view('layouts.home', $this->data);
    }
}
