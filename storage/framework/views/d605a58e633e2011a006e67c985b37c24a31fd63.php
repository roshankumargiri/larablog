<?php $__env->startSection('title','MyBlog | User index'); ?>

<?php $__env->startSection('content'); ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Display All Users</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="active">
                <a href="<?php echo e(route('backend.user.index')); ?>">Users</a>
            </li>
            <li class="active">
                All Users
            </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header clearfix">
                        <div class="pull-left">
                            <a href="<?php echo e(route('backend.user.create')); ?>" class="btn btn-success"> Add User</a>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <?php if(session('message')): ?>
                        <div class="alert alert-info">
                            <?php echo e(session('message')); ?>

                        </div>
                        <?php elseif(session('error-message')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(session('error-message')); ?>

                        </div>
                        <?php endif; ?>
                        <?php if(!$users->count()): ?>
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                        <?php else: ?>
                        <table class="table table-borered">
                            <thead>
                                <tr>
                                    <td width='80'><b>Action</b></td>
                                    <td><b>User Name</b></td>
                                    <td><b>User Email</b></td>
                                    <td><b>User Role</b></td>
                                    <td><b>Post Count</b></td>



                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td>
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <form method="POST" action="<?php echo e(route('backend.user.edit',$user->id)); ?>">
                                                    <?php echo method_field('GET'); ?>
                                                    <?php echo csrf_field(); ?>
                                                    <button submit"
                                                        class="btn btn-xs btn-info <?php echo e($user->id == 1 ? 'disabled':''); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-xs-3">
                                                <form method="POST"
                                                    action="<?php echo e(route('backend.user.destroy',$user->id)); ?>">
                                                    <?php echo method_field('DELETE'); ?>
                                                    <?php echo csrf_field(); ?>


                                                    <button
                                                        onclick="return confirm('You are about to delete this user permanently. Are you sure you want to delete ?')"
                                                        submit"
                                                        class="btn btn-xs btn-danger <?php echo e($user->id == 1 ? 'disabled':''); ?>">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>-</td>
                                    <td><?php echo e($user->posts->count()); ?></td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            <?php echo e($users->appends(Request::query())->render()); ?>

                        </div>
                        <div class="pull-right">

                            <small><?php echo e($userCount); ?><?php echo e(str_plural(' Item',$userCount)); ?></small>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/backend/user/index.blade.php ENDPATH**/ ?>