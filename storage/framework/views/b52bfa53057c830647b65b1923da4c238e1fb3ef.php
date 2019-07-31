<?php $__env->startSection('title','MyBlog | Blog index'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blog
            <small>Edit Post</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="<?php echo e(route('backend.blog.index')); ?>">Blog</a>
            </li>
            <li class="active">
                Edit Post
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <?php echo $__env->make('backend.blog.editform', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.blog.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/backend/blog/edit.blade.php ENDPATH**/ ?>