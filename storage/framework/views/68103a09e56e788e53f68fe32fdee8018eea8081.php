

<?php $__env->startSection('content'); ?>
    <div class="page-content login-cover" >

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login card -->
                <form class="login-form " method="post" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-lock icon-2x text-warning-400 border-warning-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Your credentials</span>
                            </div>

                                <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-styled-left alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    <span class="font-weight-semibold">Oops!</span> <?php echo e(implode('<br>', $errors->all())); ?>

                                </div>
                                <?php endif; ?>


                            <div class="form-group ">
                                <input type="text" class="form-control" name="identity" value="<?php echo e(old('identity')); ?>" placeholder="Login ID or Email">
                            </div>

                            <div class="form-group ">
                                <input required name="password" type="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>">

                            </div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" <?php echo e(old('remember') ? 'checked' : ''); ?> data-fouc> Remember
                                    </label>
                                </div>

                                <a href="<?php echo e(route('password.request')); ?>" class="ml-auto">Forgot password?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                           


                        </div>
                    </div>
                </form>

            </div>


        </div>

    </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lav_sms\resources\views/auth/login.blade.php ENDPATH**/ ?>