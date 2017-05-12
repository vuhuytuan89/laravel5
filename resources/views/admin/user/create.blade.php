@extends('admin.master')
@section('content')
    <section class="content-header">
        <h1>
            Add user
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <form action="{{ url('admincp/user') }}" method="POST">
            {{ csrf_field() }}
            @if(count($errors) >0)
                <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
                </ul>
            @endif
            <div class="box">
                <div class="box-body row">
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" name="txtName" class="form-control" value="{{ old('txtName') }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="text" name="txtEmail" class="form-control"  value="{{ old('txtEmail') }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Level</label>
                        <select class="form-control" name="level"  value="{{ old('level') }}">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="form-control" name="status"  value="{{ old('status') }}">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Re-Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                </div>
                <div class="box-footer row">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i>
                        <span>Save and back</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection