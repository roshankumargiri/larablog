<?php $__env->startSection('title','MyBlog | Blog index'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Delete User</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="<?php echo e(route('backend.user.index')); ?>">Users</a>
            </li>
            <li class="active">
                Delete User
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" <?php echo e(route('backend.user.confirmdelete',$deluser->id)); ?>" method="post" role="form"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="col-xs-9">
                    <div class="box">
                        <p>You have specified the following user for deletion: </p>
                        User Name:<?php echo e($deluser->name); ?>

                        User Id: <?php echo e($deluser->id); ?>


                        <p>What should be done with content own by this user?</p>
                        <div class="form-group<?php echo e($errors->has('category_id') ? ' has-error' : ''); ?>">
                            <select name="newuser">
                                <option selected value="none">Delete all Content</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user->id != $deluser->id): ?>
                                <option value="<?php echo e($user->id); ?>">Assign to: <?php echo e($user->name); ?></option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="box-footer">
                            <div class="pull-left">
                                <button class="btn btn-danger" type="submit">Delete User</button>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.blog.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/backend/user/deleteform.blade.php ENDPATH**/ ?>