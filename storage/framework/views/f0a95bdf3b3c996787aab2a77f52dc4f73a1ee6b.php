<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if(!$posts->count()): ?>
            <div class="alert alert-danger">
                <p> Nothing Found</p>
            </div>
            <?php elseif(isset($categoryName)): ?>
            <div class="alert alert-info">
                <p> Category: <b><?php echo e(' '.$categoryName); ?></b></p>
            </div>
            <?php elseif(isset($userName)): ?>
            <div class="alert alert-info">
                <p> Posts By: <b><?php echo e(' '.$userName); ?></b></p>
            </div>
            <?php endif; ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="post-item">
                <?php if($post->image_url): ?>
                <div class="post-item-image">
                    <a href="<?php echo e(route('blog.show',$post->slug)); ?>">
                        <!-- <img src="/img/<?php echo e($post->image); ?>" alt=""> -->
                        <img src="<?php echo e($post->image_url); ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
                <div class="post-item-body">
                    <div class="padding-10">
                        <h2><a href="<?php echo e(route('blog.show',$post->slug)); ?>"><?php echo e($post->title); ?></a></h2>
                        <p><?php echo $post->excerpt_html; ?></p>
                    </div>

                    <div class="post-meta padding-10 clearfix">
                        <div class="pull-left">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a href="<?php echo e(route('user',$post->user->slug)); ?>">
                                        <?php echo e($post->user->name); ?></a></li>
                                <li><i class="fa fa-clock-o"></i><time> <?php echo e($post->date); ?></time></li>
                                <li><i class="fa fa-folder"></i><a href="<?php echo e(route('category',$post->category->slug)); ?>">
                                        <?php echo e($post->category->title); ?></a></li>
                                <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo e(route('blog.show',$post->slug)); ?>">Continue Reading &raquo;</a>
                        </div>
                    </div>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <nav>
                <?php echo e($posts->links()); ?>

            </nav>
        </div>

        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/blog/index.blade.php ENDPATH**/ ?>