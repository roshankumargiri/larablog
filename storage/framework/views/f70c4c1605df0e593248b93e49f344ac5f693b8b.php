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
        <?php $request = request(); ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>

            <td>
                <div class="row">

                    <form method="POST" action="<?php echo e(route('backend.blog.destroy',$post->id)); ?>">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <?php if(check_user_permissions($request,"Blog@edit",$post->id)): ?>
                        <a href="<?php echo e(route('backend.blog.edit',$post->id)); ?>" class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <?php else: ?>
                        <a href="#" class="btn btn-xs btn-info disabled">
                            <i class="fa fa-edit"></i>
                        </a>
                        <?php endif; ?>
                        <?php if(check_user_permissions($request,"Blog@destroy",$post->id)): ?>
                        <button type="submit" class="btn btn-xs btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                        <?php else: ?>
                        <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-trash"></i>
                        </button>
                        <?php endif; ?>
                    </form>

                </div>
            </td>
            <td><?php echo e($post->title); ?></td>
            <td><?php echo e($post->user->name); ?></td>
            <td><?php echo e($post->category->title); ?></td>
            <td>
                <abbr title="<?php echo e($post->dateFormatted(true)); ?>"><?php echo e($post->dateFormatted()); ?>

                </abbr> |
                <?php echo $post->publicationLabel(); ?>

            </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH E:\laravel\blog\resources\views/backend/blog/table.blade.php ENDPATH**/ ?>