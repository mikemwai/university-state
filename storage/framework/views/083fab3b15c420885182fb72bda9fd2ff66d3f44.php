

<?php $__env->startSection('content'); ?>
    <div class="page-content login-cover">

        <div class="content-wrapper">
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Password recovery form -->
        <form class="login-form" method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>
            <div class="card mb-0">
                <div class="card-body">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                        <?php if($errors->has('email')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                        <?php endif; ?>

                    <div class="text-center mb-3">
                        <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Password recovery</h5>
                        <span class="d-block text-muted">We'll send you instructions in email</span>
                    </div>

                    <div class="form-group ">
                        <input name="email" required type="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Your email">
                    </div>

                    <button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> Reset password</button>
                </div>
            </div>
        </form>
        <!-- /password recovery form -->

    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>