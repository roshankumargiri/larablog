<?php $__env->startSection('title','MyBlog | Blog index'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>Add New Category</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="<?php echo e(route('backend.category.index')); ?>">Categories</a>
            </li>
            <li class="active">
                Add Category
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action=" <?php echo e(route('backend.category.update',$category->id)); ?>" method="post" role="form"
                enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>

                <div class="col-xs-9">
                    <div class="box">

                        <div class="box-body">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Enter Title here" id="title"
                                    class="form-control" value="<?php echo e($category->title); ?>">
                                <?php if($errors->has('title')): ?>
                                <span class="help-block"><?php echo e($errors->first('title')); ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control"
                                    value="<?php echo e($category->slug); ?>">
                                <?php if($errors->has('slug')): ?>
                                <span class="help-block"><?php echo e($errors->first('slug')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <button class="btn btn-info" type="submit">Update Category</button>
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

<?php echo $__env->make('layouts.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/backend/category/editform.blade.php ENDPATH**/ ?>