<?php echo csrf_field(); ?>
<div class="col-xs-9">
    <div class="box">

        <div class="box-body">
            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Enter Title here" id="title" class="form-control"
                    value="<?php echo e(old('title')); ?>">
                <?php if($errors->has('title')): ?>
                <span class="help-block"><?php echo e($errors->first('title')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                <label for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" value="<?php echo e(old('slug')); ?>">
                <?php if($errors->has('slug')): ?>
                <span class="help-block"><?php echo e($errors->first('slug')); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <button class="btn btn-info" type="submit">Add Category</button>
        </div>
    </div>
</div>
<?php /**PATH E:\laravel\blog\resources\views/backend/category/form.blade.php ENDPATH**/ ?>