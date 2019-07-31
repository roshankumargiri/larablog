<?php echo csrf_field(); ?>
<div class="col-xs-9">
    <div class="box">

        <div class="box-body">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <label for="name">User Name</label>
                <input type="text" name="name" placeholder="Enter your name here" id="name" class="form-control"
                    value="<?php echo e(old('name')); ?>">
                <?php if($errors->has('name')): ?>
                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter your email here" name="email" id="email" class="form-control"
                    value="<?php echo e(old('email')); ?>">
                <?php if($errors->has('email')): ?>
                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password">Password</label>
                <input type="password" placeholder="password" name="password" id="password" class="form-control"
                    value="<?php echo e(old('password')); ?>">
                <?php if($errors->has('password')): ?>
                <span class="help-block"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?>">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" placeholder="confirm password" name="confirm_password" id="confirm_password"
                    class="form-control" value="<?php echo e(old('confirm_password')); ?>">
                <?php if($errors->has('confirm_password')): ?>
                <span class="help-block"><?php echo e($errors->first('confirm_password')); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <button class="btn btn-info" type="submit">Add User</button>
        </div>
    </div>
</div>
<?php /**PATH E:\laravel\blog\resources\views/backend/user/form.blade.php ENDPATH**/ ?>