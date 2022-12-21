
<?php $__env->startSection('page_title', 'Manage Payments'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><i class="icon-cash2 mr-2"></i> Select year</h5>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <form method="post" action="<?php echo e(route('payments.select_year')); ?>">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="year" class="col-form-label font-weight-bold">Select Year <span class="text-danger">*</span></label>
                                    <select data-placeholder="Select Year" required id="year" name="year" class="form-control select">
                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(($selected && $year == $yr->year) ? 'selected' : ''); ?> value="<?php echo e($yr->year); ?>"><?php echo e($yr->year); ?></option>
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
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Payments for <?php echo e($year); ?> Session</h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-payments" class="nav-link active" data-toggle="tab">All Classes</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Class Payments</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#pc-<?php echo e($mc->id); ?>" class="dropdown-item" data-toggle="tab"><?php echo e($mc->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            </ul>

            <div class="tab-content">
                    <div class="tab-pane fade show active" id="all-payments">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Ref_No</th>
                                <th>Class</th>
                                <th>Method</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($p->title); ?></td>
                                    <td><?php echo e($p->amount); ?></td>
                                    <td><?php echo e($p->ref_no); ?></td>
                                    <td><?php echo e($p->my_class_id ? $p->my_class->name : ''); ?></td>
                                    <td><?php echo e(ucwords($p->method)); ?></td>
                                    <td><?php echo e($p->description); ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    
                                                <a href="<?php echo e(route('payments.edit', $p->id)); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    
                                                    <a id="<?php echo e($p->id); ?>" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-<?php echo e($p->id); ?>" action="<?php echo e(route('payments.destroy', $p->id)); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade" id="pc-<?php echo e($mc->id); ?>">
                        <table class="table datatable-button-html5-columns">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Ref_No</th>
                                <th>Class</th>
                                <th>Method</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $payments->where('my_class_id', $mc->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($p->title); ?></td>
                                    <td><?php echo e($p->amount); ?></td>
                                    <td><?php echo e($p->ref_no); ?></td>
                                    <td><?php echo e($p->my_class_id ? $p->my_class->name : ''); ?></td>
                                    <td><?php echo e(ucwords($p->method)); ?></td>
                                    <td><?php echo e($p->description); ?></td>
                                    <td class="text-center">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-left">
                                                    
                                                    <a href="<?php echo e(route('payments.edit', $p->id)); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                    
                                                    <a id="<?php echo e($p->id); ?>" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-<?php echo e($p->id); ?>" action="<?php echo e(route('payments.destroy', $p->id)); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/support_team/payments/index.blade.php ENDPATH**/ ?>