@extends('layouts.master_full')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <form action="{{ url('/checkout') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-12 clearfix">
                    <div class="container">
                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ol>
                        </div>
                        <div class="bill-to">
                            <p>Thông tin khách hàng</p>
                                @if(count($errors) >0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-one">
                                    <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email *">
                                    <input type="text" name="address" value="{{ old('address') }}" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="{{ old('message') }}"  placeholder="Ghi chú" rows="10"></textarea>
                                </div>
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
                                                    {{ $item->qty }}
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">{{ number_format($item->subtotal)}}
                                                        VNĐ</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4">&nbsp;
                                            <span>
                                            <a class="btn btn-default update" href="{{ url('/cart')}}">Quay về giỏ
                                                hàng</a>
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
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-default check_out"
                                                               href="{{ url('checkout')}}">Gửi đơn hàng</button></td>
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
                                                <a class="btn btn-default update" href="{{ url('/')}}">Mua hàng</a>
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
                </form>
            </div>
        </div>
    </section>
@endsection