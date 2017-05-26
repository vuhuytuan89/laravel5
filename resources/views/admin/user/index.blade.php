@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a href="{{ url('admincp/user/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            <span>Add User</span>
        </a>
        <p style="height: 5px"></p>
        @if (Session::has('message'))

                <div class="alert alert-info"> {{ Session::get('message') }}</div>
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
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Level</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Actions</th></tr>
                            </thead>
                            <tbody>
                            @if (count($listUser) >0)
                                @foreach($listUser as $user)
                                    <tr role="row" class="odd">
                                        <td>{{ $user->id }}</td>
                                        <td class="sorting_1">{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->level }}</td>
                                        <td>
                                            @if ($user->status == 1)
                                                <span class="btn bg-green">Active</span>
                                            @else
                                                <span class="btn bg-yellow">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('admincp/user')}}/{{ $user->id }}/edit" class="btn btn-default bg-purple">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edits</span>
                                                </a>
                                                <!--<a href="#" class="btn btn-default bg-red" onclick="delUser('{{ $user->id }}');"></a>-->
                                                <a href="#" class="btn btn-default bg-red btnDelete" data-value="{{ $user->id }}">
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
                        {!! $listUser->render() !!}
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
        /*function delUser(id)
         {
         alert
         var actionLink = "{{ url('admincp/user')}}/"+ id;
         document.getElementById('formDelete').action = actionLink;
         document.getElementById('formDelete').submit();
         }*/
        $(document).ready(function() {
            $('.btnDelete').click(function(){
                var userId = $(this).attr('data-value');
                $('#confirm')
                    .modal({ backdrop: 'static', keyboard: false })
                    .one('click', '#delete', function (e) {
                        //delete function
                        var actionLink = "{{ url('admincp/user')}}/"+ userId;
                        $('#formDelete').attr('action', actionLink).submit();
                    });

            });
        });
    </script>

@endsection