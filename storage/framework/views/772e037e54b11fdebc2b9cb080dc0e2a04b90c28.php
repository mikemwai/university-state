
<?php $__env->startSection('page_title', 'Manage Exam Marks'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-books mr-2"></i> Manage Exam Marks</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <?php echo $__env->make('pages.support_team.marks.selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/support_team/marks/index.blade.php ENDPATH**/ ?>