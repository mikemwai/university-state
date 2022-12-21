<form method="post" action="<?php echo e(route('marks.selector')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-10">
                <fieldset>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exam_id" class="col-form-label font-weight-bold">Exam:</label>
                                <select required id="exam_id" name="exam_id" data-placeholder="Select Exam" class="form-control select">
                                    <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($selected && $exam_id == $ex->id ? 'selected' : ''); ?> value="<?php echo e($ex->id); ?>"><?php echo e($ex->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                <select required onchange="getClassSubjects(this.value)" id="my_class_id" name="my_class_id" class="form-control select">
                                    <option value="">Select Class</option>
                                    <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(($selected && $my_class_id == $c->id) ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id" class="col-form-label font-weight-bold">Section:</label>
                                <select required id="section_id" name="section_id" data-placeholder="Select Class First" class="form-control select">
                                   <?php if($selected): ?>
                                        <?php $__currentLoopData = $sections->where('my_class_id', $my_class_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($section_id == $s->id ? 'selected' : ''); ?> value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="subject_id" class="col-form-label font-weight-bold">Subject:</label>
                                <select required id="subject_id" name="subject_id" data-placeholder="Select Class First" class="form-control select-search">
                                  <?php if($selected): ?>
                                        <?php $__currentLoopData = $subjects->where('my_class_id', $my_class_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($subject_id == $s->id ? 'selected' : ''); ?> value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </div>

            <div class="col-md-2 mt-4">
                <div class="text-right mt-1">
                    <button type="submit" class="btn btn-primary">Manage Marks <i class="icon-paperplane ml-2"></i></button>
                </div>
            </div>

        </div>

    </form>
<?php /**PATH C:\xampp\htdocs\lav_sms\resources\views/pages/support_team/marks/selector.blade.php ENDPATH**/ ?>