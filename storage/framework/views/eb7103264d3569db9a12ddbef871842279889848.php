
<?php $__env->startSection('page_title', 'Student Payments'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-cash2 mr-2"></i> Student Payments</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <form method="post" action="<?php echo e(route('payments.select_class')); ?>">
                <?php echo csrf_field(); ?>
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                      <div class="row">
                          <div class="col-md-10">
                              <div class="form-group">
                                  <label for="my_class_id" class="col-form-label font-weight-bold">Class:</label>
                                  <select required id="my_class_id" name="my_class_id" class="form-control select">
                                      <option value="">Select Class</option>
                                      <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option <?php echo e(($selected && $my_class_id == $c->id) ? 'selected' : ''); ?> value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </select>
                              </div>
                          </div>

                          <div class="col-md-2 mt-4">
                              <div class="text-right mt-1">
                                  <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>

            </form>
        </div>
    </div>
    <?php if($selected): ?>
        <div class="card">
            <div class="card-body">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Payments</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="<?php echo e($s->user->photo); ?>" alt="photo"></td>
                            <td><?php echo e($s->user->name); ?></td>
                            <td><?php echo e($s->adm_no); ?></td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class=" btn btn-danger" data-toggle="dropdown"> Manage Payments <i class="icon-arrow-down5"></i>
                                    </a>
                            <div class="dropdown-menu dropdown-menu-left">
                                <a href="<?php echo e(route('payments.invoice', [Qs::hash($s->user_id)])); ?>" class="dropdown-item">All Payments</a>
                                <?php $__currentLoopData = Pay::getYears($s->user_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $py): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($py): ?>
                                    <a href="<?php echo e(route('payments.invoice', [Qs::hash($s->user_id), $py])); ?>" class="dropdown-item"><?php echo e($py); ?></a>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/support_team/payments/manage.blade.php ENDPATH**/ ?>