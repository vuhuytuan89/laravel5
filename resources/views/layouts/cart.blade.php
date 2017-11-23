@extends('layouts.master_full')
@section('content')
    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <section id="cart_items">
                        <div class="container">
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Shopping Cart</li>
                                </ol>
                            </div>
                            <div class="table-responsive cart_info">

                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Ảnh minh họa</td>
                                        <td class="description">Tên sản phẩm</td>
                                        <td class="price">Giá</td>
                                        <td class="quantity">Số lượng</td>
                                        <td class="total">Tổng</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($cart))
                                        @foreach($cart as $item)
                                            <tr>
                                                <td class="cart_product" style="margin: 0px">
                                                    @if($item->options->image_path)
                                                        <img width="100px" height="100px" src="{{ asset($item->options->image_path) }}" alt="" />
                                                    @else
                                                        <img width="100px" height="100px" src="{{ asset('layouts/images') }}/home/product1.jpg" alt="" />
                                                    @endif
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