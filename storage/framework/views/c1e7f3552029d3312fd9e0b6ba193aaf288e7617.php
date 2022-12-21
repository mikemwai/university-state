
<li class="nav-item">
    <a href="<?php echo e(route('settings')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['settings',]) ? 'active' : ''); ?>"><i class="icon-gear"></i> <span>Settings</span></a>
</li>


<li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['pins.create', 'pins.index']) ? 'nav-item-expanded nav-item-open' : ''); ?> ">
    <a href="#" class="nav-link"><i class="icon-lock2"></i> <span> Pins</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="Manage Pins">
        
            <li class="nav-item">
                <a href="<?php echo e(route('pins.create')); ?>"
                   class="nav-link <?php echo e((Route::is('pins.create')) ? 'active' : ''); ?>">Generate Pins</a>
            </li>

        
        <li class="nav-item">
            <a href="<?php echo e(route('pins.index')); ?>"
               class="nav-link <?php echo e((Route::is('pins.index')) ? 'active' : ''); ?>">View Pins</a>
        </li>
    </ul>
</li><?php /**PATH C:\xampp\htdocs\lav_sms\resources\views/pages/super_admin/menu.blade.php ENDPATH**/ ?>