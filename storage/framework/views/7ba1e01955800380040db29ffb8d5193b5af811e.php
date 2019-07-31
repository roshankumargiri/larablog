<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/<?php echo e(Auth::user()->gavatar); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::user()->name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('backend.blog.index')); ?>"><i class="fa fa-circle-o"></i> All Posts</a></li>
                    <li><a href="<?php echo e(route('backend.blog.create')); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>
            <?php if (app('laratrust')->hasRole(['admin','editor'])) : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('backend.category.index')); ?>"><i class="fa fa-circle-o"></i> All
                            Categories</a></li>
                    <li><a href="<?php echo e(route('backend.category.create')); ?>"><i class="fa fa-circle-o"></i> Add New
                            Category</a></li>
                </ul>
            </li>
            <?php endif; // app('laratrust')->hasRole ?>
            <?php if (app('laratrust')->hasRole('admin')) : ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('backend.user.index')); ?>"><i class="fa fa-circle-o"></i> All
                            Users</a></li>
                    <li><a href="<?php echo e(route('backend.user.create')); ?>"><i class="fa fa-circle-o"></i> Add New
                            User</a></li>
                </ul>
            </li>
            <?php endif; // app('laratrust')->hasRole ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH E:\laravel\blog\resources\views/layouts/backend/sidebar.blade.php ENDPATH**/ ?>