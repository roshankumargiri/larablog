<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>
<div class="col-xs-9">
    <div class="box">

        <div class="box-body">
            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <label for="name">User Name</label>
                <input type="text" name="name" placeholder="Enter your name here" id="name" class="form-control"
                    value="<?php echo e($user->name); ?>">
                <?php if($errors->has('name')): ?>
                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                <label for="slug">Slug</label>
                <input type="text" name="slug" placeholder="Enter your slug here" id="slug" class="form-control"
                    value="<?php echo e($user->name); ?>">
                <?php if($errors->has('slug')): ?>
                <span class="help-block"><?php echo e($errors->first('slug')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email">Email</label>
                <input type="email" placeholder="Enter your email here" name="email" id="email" class="form-control"
                    value="<?php echo e($user->email); ?>">
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


            <div class="form-group<?php echo e($errors->has('role') ? ' has-error' : ''); ?>">
                <label for="role">Role</label>

                <select class="form-control" name="role" id="role">

                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($role->id); ?>" <?php echo e($user->roles->first()->id == $role->id ? 'selected':''); ?>>
                        <?php echo e($role->display_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>
                <?php if($errors->has('role')): ?>
                <span class="help-block"><?php echo e($errors->first('role')); ?></span>
                <?php endif; ?>
            </div>
            <div class="bio form-group<?php echo e($errors->has('bio') ? ' has-error' : ''); ?>">
                <label for="bio">Bio</label>
                <textarea name="bio" id="bio" rows="5" class="form-control"><?php echo $user->slug; ?></textarea>
                <?php if($errors->has('bio')): ?>
                <span class="help-block"><?php echo e($errors->first('bio')); ?></span>
                <?php endif; ?> </div>
        </div>
    </div>
    <div class="box-footer">
        <div class="pull-left">
            <button class="btn btn-info" type="submit">Update User</button>
        </div>
    </div>
</div>
<?php echo $__env->make('backend.user.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH E:\laravel\blog\resources\views/backend/user/editform.blade.php ENDPATH**/ ?>