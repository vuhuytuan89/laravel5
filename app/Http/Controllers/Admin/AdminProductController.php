<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['title'] = 'List products';
        $productsInfo = DB::table('products')
            ->orderBy('id', 'desc')
            ->paginate(10);
        $this->data['listProduct'] = $productsInfo;
        return view('admin.product.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'txtName' => 'required'
        ];
        $validator = Validator::make(Input::all(), $rule);
        if  ($validator->fails()) {
            return Redirect::to('admincp/product/edit');
        } else {
            $product = new Product;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['title'] = 'Edit Product';
        $productInfo = DB::table('products')->find($id);
        $this->data['listCate'] = DB::table('categories')->orderBy('id','asc')->get();
        $this->data['product'] = $productInfo;
        return view('admin.product.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'txtName' => 'required'
        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return Redirect::to('admincp/product/' . $id . '/edit');
        } else {
            $product = Product::find($id);
            $product->name = $request->input('txtName');
            $product->alias = $request->input('txtAlias');
            $product->desc = $request->input('txtDesc');
            $product->content = $request->input('txtContent');
            $product->price = $request->input('txtPrice');
            $product->cate_id = $request->input('cate_id');
            $product->meta_title = $request->input('meta_title');
            $product->meta_key = $request->input('meta_key');
            $product->meta_desc = $request->input('meta_desc');
            $product->save();
            Session::flash('message', "Successfully edited product");
            return Redirect::to('admincp/product');
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
