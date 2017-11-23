<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use Cart;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;


class CartController extends Controller
{

    public function cart()
    {
        $this->data['title'] = 'Giỏ hàng của bạn';
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            //$product = Product::find($product_id);
            $product = DB::table('products')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->select('products.*', 'product_images.image_path')
                ->where('products.id', '=', $product_id)
                ->get();
            $cartInfo = [
                'id' => $product_id,
                'name' => $product[0]->name,
                'price' => $product[0]->price,
                'qty' => '1',
                'options' => [
                    'image_path' => $product[0]->image_path
                ]
            ];
            Cart::add($cartInfo);
        }
        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function ($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function ($key, $value) {
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

    public function postRemoveItem()
    {
        if (Request::isMethod('post')) {
            if (Request::get('product_id')) {
                $rows = Cart::search(function ($key, $value) {
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

    public function postDestroyCart()
    {
        Cart::destroy();
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('layouts.cart', $this->data);
    }

    public function getCheckOut()
    {
        $this->data['title'] = 'Check out';
        $this->data['cart'] = Cart::content();
        $this->data['total'] = Cart::total();
        return view('layouts.checkout', $this->data);
    }

    public function postCheckOut(Request $request)
    {
        $cartInfor = Cart::content();
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|digits_between:10,12'

        ];
        $validator = Validator::make(Input::all(), $rule);
        if ($validator->fails()) {
            return redirect('/checkout')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            // save
            $customer = new Customer;
            $customer->name = Request::get('fullName');
            $customer->email = Request::get('email');
            $customer->address = Request::get('address');
            $customer->phone_number = Request::get('phoneNumber');
            //$customer->note = $request->note;
            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = number_format(str_replace(',', '', Cart::total()));
            $bill->note = Request::get('note');
            $bill->save();

            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new BillDetail;
                    $billDetail->bill_id = $bill->id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantily = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }

            Cart::destroy();

            echo 'thanh cong';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
