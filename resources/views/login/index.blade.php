@extends('default')
@section('content')

    <div class="form-group" style="width: 500px; margin: 0 auto">
        @if(count($errors) >0)
            @foreach($errors->all()  as $error)
                <p class="alert-danger">{{ $error }}</p>
            @endforeach
        @endif
        <form action="" method="post">
            <!--<input type="hidden" name="_token" value="{{csrf_token()}}">-->
            {{csrf_field()}}
            <label>User</label><input type="text" name="user" class="form-control" placeholder="username">
            <label>Pass</label><input type="password" name="pass" class="form-control" placeholder="password" >
            <input type="submit" value="send" class="btn btn-primary" style="float:right; margin: 10px 0px">
        </form>
    </div>
@endsection