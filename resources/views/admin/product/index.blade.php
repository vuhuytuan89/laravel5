<?php
/**
 * Created by PhpStorm.
 * User: vu.huy.tuan
 * Date: 6/2/2017
 * Time: 4:44 PM
 */
?>
@extends('admin.master')
@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        List Products
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="{{ url('admincp/product/create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i>
        <span>Add Product</span>
    </a>
    <p style="height: 5px"></p>
    @if (isset($message))
        <div class="alert alert-info"> {{ $message }}</div>
    @endif
    <input type="text" id="myInput" onkeyup="searchByColumnNo('1')" placeholder="Search for names.." class="form-control">
    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-12">
                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="" >ID</th>
                            <th class="sorting_asc col-md-5" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Name</th>
                            <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Alias</th>
                            <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Price</th>
                            <th class="sorting col-md-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Status</th>
                            <th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Actions</th></tr>
                        </thead>
                        <tbody>
                        @if (count($listProduct) >0)
                            @foreach($listProduct as $product)
                                <tr role="row" class="odd">
                                    <td>{{ $product->id }}</td>
                                    <td class="sorting_1">{{ $product->name }}</td>
                                    <td>{{ $product->alias }}</td>
                                    <td>{{ number_format($product->price )}}</td>
                                    <td>
                                        @if ($product->status == 1)
                                            <span class="btn bg-green">Active</span>
                                        @else
                                            <span class="btn bg-yellow">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('admincp/product')}}/{{ $product->id }}" class="btn btn-default bg-purple">
                                                <i class="fa fa-edit"></i>
                                                <span>Edits</span>
                                            </a>
                                            <a href="#" class="btn btn-default bg-red btnDelete" data-value="{{ $product->id }}">
                                                <i class="fa fa-edit"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div style="float:right">
                        {!! $listProduct->render() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.box -->

</section>
<!-- /.content -->
<form action="" method="post" id="formDelete">
    <input type="hidden" name="_method" value="DELETE">
    {{ csrf_field() }}
</form>
<div id="confirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirm delete</h4>
            </div>
            <div class="modal-body">
                <p> Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-js-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btnDelete').click(function(){
                var userId = $(this).attr('data-value');
                $('#confirm')
                    .modal({ backdrop: 'static', keyboard: false })
                    .one('click', '#delete', function (e) {
                        //delete function
                        var actionLink = "{{ url('admincp/product')}}/"+ userId;
                        $('#formDelete').attr('action', actionLink).submit();
                    });
            });
        });
    </script>

@endsection
