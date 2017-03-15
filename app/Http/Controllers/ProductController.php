<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "index";
        $product = Product::all();
        return $product;
        //echo "<pre>"; var_dump(json_decode($product));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo "store";
        $product = new Product;
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->save();
        // 201 trả dữ liệu về kiểu json
        return Response($product, 201);
       // echo "<pre>"; var_dump($request->input);
       // $sanpham = 
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
        echo "show";
        $product = Product::find($id);
        return $product;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo "edit";
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
        //
        echo "update " . $id . ' Reques=' .$request;

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->price = $request->input('price');
        $product->save();
        return response($product, 201);
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
        echo "destroy" . $id;
        $product = Product::find($id);
        $product->delete();
    }
}
