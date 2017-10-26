<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use Cart;

class CartController extends Controller
{

    public function cart()
    {
        $this->data['title'] = 'Giỏ hàng của bạn';
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            $cartInfo = [
                'id' => $product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => '1'
            ];
            Cart::add($cartInfo);
        }
        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        $cart = Cart::content();
        $this->data['cart'] = $cart;
        $this->data['total'] = Cart::total();
        return view('layouts.cart', $this->data);

    }

    public function postRemoveItem() {
        if (Request::isMethod('post')) {
            if (Request::get('product_id')) {
                $rows = Cart::search(function($key, $value) {
                    return $key->id == Request::get('product_id');
                });
                $item = $rows->first();
                if (isset($item->rowId)) {
                    Cart::remove($item->rowId);
                }
            }
        }
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('layouts.cart', $this->data);
    }

    public function postDestroyCart() {
        Cart::destroy();
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('layouts.cart', $this->data);
    }

    public function getCheckOut() {
        $this->data['title'] = 'Check out';
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('layouts.checkout', $this->data);
    }
}
