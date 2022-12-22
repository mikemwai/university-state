<div id="page-header" class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-plus-circle2 mr-2"></i> <span class="font-weight-semibold"><?php echo $__env->yieldContent('page_title'); ?></span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
   
                <a href="<?php echo e(Qs::userIsSuperAdmin() ? route('settings') : ''); ?>" class="btn btn-link btn-float text-default"><i class="icon-arrow-down7 text-primary"></i> <span class="font-weight-semibold">Current Session: <?php echo e(Qs::getSetting('current_session')); ?></span></a>
            </div>
        </div>
    </div>

    
    
</div>
<?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/partials/header.blade.php ENDPATH**/ ?>