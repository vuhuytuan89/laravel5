@extends('layouts.master_full')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 clearfix">
                    <div class="container">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="bill-to">
                        <p>Bill To</p>
                        <form>
                            <div class="form-one">
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">

                            </div>
                            <div class="form-two">
                                <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="10"></textarea>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <section id="cart_items">
                        <div class="container">

                            <div class="table-responsive cart_info">

                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Item</td>
                                        <td class="description"></td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="total">Total</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($cart))
                                        @foreach($cart as $item)
                                            <tr>
                                                <td class="cart_product" style="margin: 0px">
                                                    <a href=""><img
                                                                width="100px"
                                                                src="{{ asset('layouts/images') }}/home/product1.jpg"
                                                                alt=""></a>
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href="">{{ $item->name }}</a></h4>

                                                    <p>Web ID: {{ $item->id }}</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>{{ number_format($item->price)}} VNĐ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    <div class="cart_quantity_button">
                                                        <a class="cart_quantity_down"
                                                           href="{{url("cart?product_id=$item->id&increment=1")}}">
                                                            + </a>
                                                        <input class="cart_quantity_input" type="text" name="quantity"
                                                               value="{{$item->qty}}" autocomplete="off" size="2">
                                                        <a class="cart_quantity_down"
                                                           href="{{url("cart?product_id=$item->id&decrease=1")}}">
                                                            - </a>
                                                    </div>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{ number_format($item->subtotal)}}
                                                        VNĐ</p>
                                                </td>
                                                <td class="cart_delete">
                                                    <form method="POST" action="{{ url('clear-cart')}}">
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-fefault add-to-cart">
                                                            <i class="fa  fa-times"></i>

                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">&nbsp;
                                            <span>
                                            <a class="btn btn-default update" href="{{ url('/')}}">Tiếp tục mua hàng</a>
                                            </span>

                                            </td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tbody>
                                                    <tr>
                                                        <td>Tổng :</td>
                                                        <td><span>{{ $total }} VNĐ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <span>
                                                            <form method="POST" action="{{ url('/clear-all') }}">
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }}">
                                                                <button type="submit" class="btn btn-default update">
                                                                    <i class="fa fa-trash-o"> Xóa hết</i>
                                                                </button>
                                                            </form>
                                                        </span>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-default check_out"
                                                               href="{{ url('checkout')}}">Tiếp tục</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>You have no items in the shopping cart</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                                <a class="btn btn-default update" href="{{ url('/')}}">Tiếp tục mua
                                                    hàng</a>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <!--/#cart_items-->
                </div>
            </div>
        </div>
    </section>

@endsection