<?php $__env->startSection('content'); ?>
    <section>
        <div class="container">
            <div class="row">
                <form action="<?php echo e(url('/checkout')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
                                <?php if(count($errors) >0): ?>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="text-danger"><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="form-one">
                                    <input type="text" name="fullName" value="<?php echo e(old('fullName')); ?>" placeholder="Họ và Tên *">
                                    <input type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email *">
                                    <input type="text" name="address" value="<?php echo e(old('address')); ?>" placeholder="Địa Chỉ *">
                                    <input type="text" name="phoneNumber" value="<?php echo e(old('phoneNumber')); ?>" placeholder="Số điện thoại *">
                                    <p style="color: red; font-size: 14px">(*) Thông tin quý khách phải nhập đầy đủ</p>
                                </div>
                                <div class="form-two">
                                    <textarea name="note" value="<?php echo e(old('message')); ?>"  placeholder="Ghi chú" rows="10"></textarea>
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
                                    <?php if(count($cart)): ?>
                                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="cart_product" style="margin: 0px">
                                                    <?php if($item->options->image_path): ?>
                                                        <img width="100px" height="100px" src="<?php echo e(asset($item->options->image_path)); ?>" alt="" />
                                                    <?php else: ?>
                                                        <img width="100px" height="100px" src="<?php echo e(asset('layouts/images')); ?>/home/product1.jpg" alt="" />
                                                    <?php endif; ?>
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href=""><?php echo e($item->name); ?></a></h4>

                                                    <p>Web ID: <?php echo e($item->id); ?></p>
                                                </td>
                                                <td class="cart_price">
                                                    <p><?php echo e(number_format($item->price)); ?> VNĐ</p>
                                                </td>
                                                <td class="cart_quantity">
                                                    <?php echo e($item->qty); ?>

                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price"><?php echo e(number_format($item->subtotal)); ?>

                                                        VNĐ</p>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                            <span>
                                            <a class="btn btn-default update" href="<?php echo e(url('/cart')); ?>">Quay về giỏ
                                                hàng</a>
                                            </span>

                                            </td>
                                            <td colspan="2">
                                                <table class="table table-condensed total-result">
                                                    <tbody>
                                                    <tr>
                                                        <td>Tổng :</td>
                                                        <td><span><?php echo e($total); ?> VNĐ</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-default check_out"
                                                               href="<?php echo e(url('checkout')); ?>">Gửi đơn hàng</button></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td>You have no items in the shopping cart</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;
                                                <a class="btn btn-default update" href="<?php echo e(url('/')); ?>">Mua hàng</a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master_full', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>