<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post-item">
                    <div class="post-item-image">
                        <a href="post.html">
                            <img src="img/Post_Image_1.jpg" alt="">
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos voluptas, blanditiis impedit repellat harum, eaque saepe aspernatur quo magnam obcaecati dolor! Deleniti quod repellendus non iste architecto, voluptate excepturi velit.</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> February 12, 2016</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="post.html">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="post-item">
                    <div class="post-item-image">
                        <a href="post.html">
                            <img src="img/Post_Image_2.jpg" alt="">
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos voluptas, blanditiis impedit repellat harum, eaque saepe aspernatur quo magnam obcaecati dolor! Deleniti quod repellendus non iste architecto, voluptate excepturi velit.</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> February 12, 2016</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Blog</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="post.html">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="post-item">
                    <div class="post-item-image">
                        <a href="post.html">
                            <img src="img/Post_Image_3.jpg" alt="">
                        </a>
                    </div>
                    <div class="post-item-body">
                        <div class="padding-10">
                            <h2><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit, consectetur adipisicing elit</a></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos voluptas, blanditiis impedit repellat harum, eaque saepe aspernatur quo magnam obcaecati dolor! Deleniti quod repellendus non iste architecto, voluptate excepturi velit.</p>
                        </div>

                        <div class="post-meta padding-10 clearfix">
                            <div class="pull-left">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="#"> Admin</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> February 12, 2016</time></li>
                                    <li><i class="fa fa-tags"></i><a href="#"> Vue Js</a>, <a href="#"> Laravel</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                            </div>
                            <div class="pull-right">
                                <a href="post.html">Continue Reading &raquo;</a>
                            </div>
                        </div>
                    </div>
                </article>

                <nav>
                  <ul class="pager">
                    <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>
                    <li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
                </nav>
            </div>
            
            <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laravel\blog\resources\views/blog/test.blade.php ENDPATH**/ ?>