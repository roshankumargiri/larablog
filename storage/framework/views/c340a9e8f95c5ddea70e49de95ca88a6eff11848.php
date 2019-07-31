<?php if(session('message')): ?>
<div class="alert alert-info">
    <?php echo e(session('message')); ?>

</div>


<?php elseif(session('trash-message')): ?>
<div class="alert alert-info">
    <?php list($message,$postId)= session('trash-message')?>
    <form method="Post" action="<?php echo e(route('backend.blog.restore',$postId)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo e($message); ?>


        <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-undo"></i> Undo</button>
    </form>
</div>

<?php endif; ?>
<?php /**PATH E:\laravel\blog\resources\views/backend/category/message.blade.php ENDPATH**/ ?>