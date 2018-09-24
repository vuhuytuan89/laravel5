<?php $__env->startSection('content'); ?>
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
        <a href="<?php echo e(url('admincp/user/create')); ?>" class="btn btn-success">
            <i class="fa fa-plus"></i>
            <span>Add User</span>
        </a>
        <p style="height: 5px"></p>
        <?php if(Session::has('message')): ?>

                <div class="alert alert-info"> <?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

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
                            <?php if(count($listUser) >0): ?>
                                <?php $__currentLoopData = $listUser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr role="row" class="odd">
                                        <td><?php echo e($user->id); ?></td>
                                        <td class="sorting_1"><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->level); ?></td>
                                        <td>
                                            <?php if($user->status == 1): ?>
                                                <span class="btn bg-green">Active</span>
                                            <?php else: ?>
                                                <span class="btn bg-yellow">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo e(url('admincp/user')); ?>/<?php echo e($user->id); ?>/edit" class="btn btn-default bg-purple">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edits</span>
                                                </a>
                                                <!--<a href="#" class="btn btn-default bg-red" onclick="delUser('<?php echo e($user->id); ?>');"></a>-->
                                                <a href="#" class="btn btn-default bg-red btnDelete" data-value="<?php echo e($user->id); ?>">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </tbody>
                </table>
                    <div style="float:right">
                        <?php echo $listUser->render(); ?>

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
        <?php echo e(csrf_field()); ?>

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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js-script'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btnDelete').click(function(){
                var userId = $(this).attr('data-value');
                $('#confirm')
                    .modal({ backdrop: 'static', keyboard: false })
                    .one('click', '#delete', function (e) {
                        //delete function
                        var actionLink = "<?php echo e(url('admincp/user')); ?>/"+ userId;
                        $('#formDelete').attr('action', actionLink).submit();
                    });
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>