<?php
/**
 * Created by PhpStorm.
 * User: vu.huy.tuan
 * Date: 6/2/2017
 * Time: 4:45 PM
 */
 ?>
@extends('admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    <section class="content">
        @if(count($errors) >0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ url('admincp/product') }}/{{ $product->id }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Info</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="txtName" class="form-control" value="{{ $product->name }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alias</label>
                            <input type="text" name="txtAlias" class="form-control"  value="{{ $product->alias }}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Desc</label>
                            <textarea name="txtDesc" class="form-control">{{ $product->desc }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <textarea name="txtContent" class="form-control">{{ $product->content }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input name="txtPrice" class="form-control" value="{{ $product->price }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Category</label>
                            <select class="form-control" name="cate_id">
                                <option value="0">---</option>
                                @foreach($listCate as $cate)
                                    <option value="{{ $cate->id }}"
                                            @if ($cate->id == $product->cate_id)
                                            selected="selected"
                                            @endif
                                            >{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Infomation</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            SEO Title <input type="text" name="meta_title" class="form-control"  value="{{ $product->meta_title }}">
                            Meta Keywords <input type="text" name="meta_key" class="form-control"  value="{{ $product->meta_key }}">
                            Meta Description <input type="text" name="meta_desc" class="form-control"  value="{{ $product->meta_desc }}">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-save"></i>
                    <span>Save and back</span>
                </button>
            </div>

        </form>
    </section>
@endsection
