
<?php $__env->startSection('page_title', 'Manage System Settings'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Update System Settungs </h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="<?php echo e(route('settings.update')); ?>">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-md-6 border-right-2 border-right-blue-400">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Name of School <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input name="system_name" value="<?php echo e($s['system_name']); ?>" required type="text" class="form-control" placeholder="Name of School">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="current_session" class="col-lg-3 col-form-label font-weight-semibold">Current Session <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select data-placeholder="Choose..." required name="current_session" id="current_session" class="select-search form-control">
                                    <option value=""></option>
                                    <?php for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++): ?>
                                        <option <?php echo e(($s['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : ''); ?>><?php echo e(($y-=1).'-'.($y+=1)); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">School Acronym</label>
                            <div class="col-lg-9">
                                <input name="system_title" value="<?php echo e($s['system_title']); ?>" type="text" class="form-control" placeholder="School Acronym">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Phone</label>
                            <div class="col-lg-9">
                                <input name="phone" value="<?php echo e($s['phone']); ?>" type="text" class="form-control" placeholder="Phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">School Email</label>
                            <div class="col-lg-9">
                                <input name="system_email" value="<?php echo e($s['system_email']); ?>" type="email" class="form-control" placeholder="School Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">School Address <span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <input required name="address" value="<?php echo e($s['address']); ?>" type="text" class="form-control" placeholder="School Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">This Term Ends</label>
                            <div class="col-lg-6">
                                <input name="term_ends" value="<?php echo e($s['term_ends']); ?>" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <span class="font-weight-bold font-italic">M-D-Y or M/D/Y </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Next Term Begins</label>
                            <div class="col-lg-6">
                                <input name="term_begins" value="<?php echo e($s['term_begins']); ?>" type="text" class="form-control date-pick" placeholder="Date Term Ends">
                            </div>
                            <div class="col-lg-3 mt-2">
                                <span class="font-weight-bold font-italic">M-D-Y or M/D/Y </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lock_exam" class="col-lg-3 col-form-label font-weight-semibold">Lock Exam</label>
                            <div class="col-lg-3">
                                <select class="form-control select" name="lock_exam" id="lock_exam">
                                    <option <?php echo e($s['lock_exam'] ? 'selected' : ''); ?> value="1">Yes</option>
                                    <option <?php echo e($s['lock_exam'] ?: 'selected'); ?> value="0">No</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                    <span class="font-weight-bold font-italic text-info-800"><?php echo e(__('msg.lock_exam')); ?></span>
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    
               <fieldset>
                   <legend><strong>Next Term Fees</strong></legend>
                   <?php $__currentLoopData = $class_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="form-group row">
                       <label class="col-lg-3 col-form-label font-weight-semibold"><?php echo e($ct->name); ?></label>
                       <div class="col-lg-9">
                           <input class="form-control" value="<?php echo e($s['next_term_fees_'.strtolower($ct->code)]); ?>" name="nt_fee_<?php echo e(strtolower($ct->code)); ?>" placeholder="<?php echo e($ct->name); ?>" type="text">
                       </div>
                   </div>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </fieldset>
                    <hr class="divider">

                    
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Change Logo:</label>
                        <div class="col-lg-9">
                            <div class="mb-3">
                                <img style="width: 100px" height="100px" src="<?php echo e($s['logo']); ?>" alt="">
                            </div>
                            <input name="logo" accept="image/*" type="file" class="file-input" data-show-caption="false" data-show-upload="false" data-fouc>
                        </div>
                    </div>
                </div>
            </div>

                <hr class="divider">

                <div class="text-right">
                    <button type="submit" class="btn btn-danger">Submit form <i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/super_admin/settings.blade.php ENDPATH**/ ?>