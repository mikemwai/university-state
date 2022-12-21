
<?php $__env->startSection('page_title', 'Manage Payments'); ?>
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-bold">Manage Payment Records for <?php echo e($sr->user->name); ?> </h6>
            <?php echo Qs::getPanelOptions(); ?>

        </div>

        <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="#all-uc" class="nav-link active" data-toggle="tab">Incomplete Payments</a></li>
                    <li class="nav-item"><a href="#all-cl" class="nav-link" data-toggle="tab">Completed Payments</a></li>
                </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-uc">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Pay_Ref</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Pay Now</th>
                        <th>Receipt_No</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $uncleared; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($uc->payment->title); ?></td>
                            <td><?php echo e($uc->payment->ref_no); ?></td>

                            
                            <td class="font-weight-bold" id="amt-<?php echo e(Qs::hash($uc->id)); ?>" data-amount="<?php echo e($uc->payment->amount); ?>"><?php echo e($uc->payment->amount); ?></td>

                            
                            <td id="amt_paid-<?php echo e(Qs::hash($uc->id)); ?>" data-amount="<?php echo e($uc->amt_paid ?: 0); ?>" class="text-blue font-weight-bold"><?php echo e($uc->amt_paid ?: '0.00'); ?></td>

                            
                            <td id="bal-<?php echo e(Qs::hash($uc->id)); ?>" class="text-danger font-weight-bold"><?php echo e($uc->balance ?: $uc->payment->amount); ?></td>

                            
                            <td>
                                <form id="<?php echo e(Qs::hash($uc->id)); ?>" method="post" class="ajax-pay" action="<?php echo e(route('payments.pay_now', Qs::hash($uc->id))); ?>">
                                    <?php echo csrf_field(); ?>
                             <div class="row">
                                 <div class="col-md-7">
                                     <input min="1" max="<?php echo e($uc->balance ?: $uc->payment->amount); ?>" id="val-<?php echo e(Qs::hash($uc->id)); ?>" class="form-control" required placeholder="Pay Now" title="Pay Now" name="amt_paid" type="number">
                                 </div>
                                 <div class="col-md-5">
                                     <button data-text="Pay" class="btn btn-danger" type="submit">Pay <i class="icon-paperplane ml-2"></i></button>
                                 </div>
                             </div>
                                </form>
                            </td>
                            
                            <td><?php echo e($uc->ref_no); ?></td>

                            <td><?php echo e($uc->year); ?></td>

                            
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">

                                            
                                            <a id="<?php echo e(Qs::hash($uc->id)); ?>" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> Reset Payment</a>
                                            <form method="post" id="item-reset-<?php echo e(Qs::hash($uc->id)); ?>" action="<?php echo e(route('payments.reset_record', Qs::hash($uc->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>

                                            
                                                <a target="_blank" href="<?php echo e(route('payments.receipts', Qs::hash($uc->id))); ?>" class="dropdown-item"><i class="icon-printer"></i> Print Receipt</a>
                                            
                            

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="all-cl">
                <table class="table datatable-button-html5-columns table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Pay_Ref</th>
                        <th>Amount</th>
                        <th>Receipt_No</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $cleared; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($cl->payment->title); ?></td>
                            <td><?php echo e($cl->payment->ref_no); ?></td>

                            
                            <td class="font-weight-bold"><?php echo e($cl->payment->amount); ?></td>
                            
                            <td><?php echo e($cl->ref_no); ?></td>

                            <td><?php echo e($cl->year); ?></td>

                            
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">

                                            
                                            <a id="<?php echo e(Qs::hash($cl->id)); ?>" onclick="confirmReset(this.id)" href="#" class="dropdown-item"><i class="icon-reset"></i> Reset Payment</a>
                                            <form method="post" id="item-reset-<?php echo e(Qs::hash($cl->id)); ?>" action="<?php echo e(route('payments.reset_record', Qs::hash($cl->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>

                                            
                                            <a target="_blank" href="<?php echo e(route('payments.receipts', Qs::hash($cl->id))); ?>" class="dropdown-item"><i class="icon-printer"></i> Print Receipt</a>

                                            
                                            

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>
        </div>
    </div>

    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/support_team/payments/invoice.blade.php ENDPATH**/ ?>