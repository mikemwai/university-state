<div class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="mt-2 mr-5">
        <a href="<?php echo e(route('dashboard')); ?>" class="d-inline-block">
        <h4 class="text-bold text-white">University State</h4>
        </a>
    </div>
  

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

			<span class="navbar-text ml-md-3 mr-md-auto"></span>

        <ul class="navbar-nav">

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <!-- <img style="width: 38px; height:38px;" src="<?php echo e(Auth::user()->photo); ?>" class="rounded-circle" alt="photo"> -->
                    <span><?php echo e(Auth::user()->name); ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?php echo e(Qs::userIsStudent() ? route('students.show', Qs::hash(Qs::findStudentRecord(Auth::user()->id)->id)) : route('users.show', Qs::hash(Auth::user()->id))); ?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo e(route('my_account')); ?>" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/partials/top_menu.blade.php ENDPATH**/ ?>