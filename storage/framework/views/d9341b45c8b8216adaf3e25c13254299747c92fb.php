<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <article class="post-item post-detail">
                <?php if($post->image_url): ?>
                <div class="post-item-image">
                    <!-- <a href="#"> -->
                    <img src="<?php echo e($post->image_url); ?>" alt="<?php echo e($post->title); ?>">
                    <!-- </a> -->
                </div>
                <?php endif; ?>
                <div class="post-item-body">
                    <div class="padding-10">
                        <h1><?php echo e($post->title); ?></h1>
                        <div class="post-meta no-border">
                            <ul class="post-meta-group">
                                <li><i class="fa fa-user"></i><a
                                        href="<?php echo e(route('user',$post->user->slug)); ?>"><?php echo e($post->user->name); ?></a></li>
                                <li><i class="fa fa-clock-o"></i><time> <?php echo e($post->date); ?></time></li>
                                <li><i class="fa fa-tags"></i><a href="<?php echo e(route('category',$post->category->slug)); ?>">
                                        <?php echo e($post->category->title); ?></a></li>
                                <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                        </div>
                        <?php echo $post->body_html; ?>

                    </div>
                </div>
            </article>
            <article class="post-author padding-10">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img alt="Author 1" src="/img/<?php echo e($post->user->gavatar); ?>" class="media-object">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a
                                href="<?php echo e(route('user',$post->user->slug)); ?>"><?php echo e($post->user->name); ?></a></h4>
                        <div class="post-author-count">
                            <a href="<?php echo e(route('user',$post->user->slug)); ?>">
                                <i class="fa fa-clone"></i>
                                <?php $post_count = $post->user->posts()->published()->count();?>
                                <?php echo e($post_count.' '); ?><?php echo e(str_plural('post',$post_count)); ?>

                            </a>
                        </div>
                        <p><?php echo $post->user->bio; ?></p>
                    </div>
                </div>
            </article>
            <!-- comments here -->
        </div>
        <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/blog/show.blade.php ENDPATH**/ ?>