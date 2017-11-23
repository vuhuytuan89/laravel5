<?php $__env->startSection('content'); ?>
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
        <form action="<?php echo e(url('admincp/user')); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <?php if(count($errors) >0): ?>
                <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="text-danger"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            <div class="box">
                <div class="box-body row">
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" name="txtName" class="form-control" value="<?php echo e(old('txtName')); ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="text" name="txtEmail" class="form-control"  value="<?php echo e(old('txtEmail')); ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Level</label>
                        <select class="form-control" name="level"  value="<?php echo e(old('level')); ?>">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Status</label>
                        <select class="form-control" name="status"  value="<?php echo e(old('status')); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>