<table class="table table-borered">
    <thead>
        <tr>
            <td width='80'><b>Action</b></td>
            <td><b>Title</b></td>
            <td width='150'><b>Author</b></td>
            <td width='150'><b>Category</b></td>
            <td width='150'><b>Date</b></td>

        </tr>
    </thead>
    <tbody>
        <?php $request = request();?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td>
                <div class="row">
                    <div class="col-xs-3">
                        <form method="POST" action="<?php echo e(route('backend.blog.restore',$post->id)); ?>">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <?php if(check_user_permissions($request,"Blog@restore",$post->id)): ?>
                            <button style="disply:inline-block" title="Restore" type="submit"
                                class="btn btn-xs btn-info ">
                                <i class="fa fa-undo"></i>
                            </button>
                            <?php else: ?>
                            <button style="disply:inline-block" onclick="return false;" title="Restore" type="submit"
                                class="btn btn-xs btn-info disabled">
                                <i class="fa fa-undo"></i>
                            </button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-xs-3">
                        <form method="POST" action="<?php echo e(route('backend.blog.force-destroy',$post->id)); ?>">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo csrf_field(); ?>
                            <?php if(check_user_permissions($request,"Blog@forceDestroy",$post->id)): ?>
                            <button style="disply:inline-block"
                                onclick="return confirm('You are about to delete this post permanently. Are you sure you want to delete ?')"
                                title="Delete Permanent" type="submit" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </button>
                            <?php else: ?>
                            <button style="disply:inline-block" onclick="return false;" title="Delete Permanent"
                                type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                            <?php endif; ?>
                        </form>
                    </div>

                </div>
            </td>
            <td><?php echo e($post->title); ?></td>
            <td><?php echo e($post->user->name); ?></td>
            <td><?php echo e($post->category->title); ?></td>
            <td>
                <abbr title="<?php echo e($post->dateFormatted(true)); ?>"><?php echo e($post->dateFormatted()); ?>

                </abbr>
            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH E:\laravel\blog\resources\views/backend/blog/table-trash.blade.php ENDPATH**/ ?>