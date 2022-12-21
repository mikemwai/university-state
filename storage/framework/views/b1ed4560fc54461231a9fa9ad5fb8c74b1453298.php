
<?php $__env->startSection('page_title', 'Student Profile - '.$sr->user->name); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <img style="width: 90%; height:90%" src="<?php echo e($sr->user->photo); ?>" alt="photo" class="rounded-circle">
                <br>
                <h3 class="mt-3"><?php echo e($sr->user->name); ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item">
                        <a href="#" class="nav-link active"><?php echo e($sr->user->name); ?></a>
                    </li>
                </ul>

                <div class="tab-content">
                    
                    <div class="tab-pane fade show active" id="basic-info">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">Name</td>
                                <td><?php echo e($sr->user->name); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ADM_NO</td>
                                <td><?php echo e($sr->adm_no); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Class</td>
                                <td><?php echo e($sr->my_class->name.' '.$sr->section->name); ?></td>
                            </tr>
                            <?php if($sr->my_parent_id): ?>
                                <tr>
                                    <td class="font-weight-bold">Parent</td>
                                    <td>
                                        <span><a target="_blank" href="<?php echo e(route('users.show', Qs::hash($sr->my_parent_id))); ?>"><?php echo e($sr->my_parent->name); ?></a></span>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="font-weight-bold">Year Admitted</td>
                                <td><?php echo e($sr->year_admitted); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Gender</td>
                                <td><?php echo e($sr->user->gender); ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Address</td>
                                <td><?php echo e($sr->user->address); ?></td>
                            </tr>
                            <?php if($sr->user->email): ?>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td><?php echo e($sr->user->email); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($sr->user->phone): ?>
                                <tr>
                                    <td class="font-weight-bold">Phone</td>
                                    <td><?php echo e($sr->user->phone.' '.$sr->user->phone2); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="font-weight-bold">Birthday</td>
                                <td><?php echo e($sr->user->dob); ?></td>
                            </tr>
                            <?php if($sr->user->bg_id): ?>
                            <tr>
                                <td class="font-weight-bold">Blood Group</td>
                                <td><?php echo e($sr->user->blood_group->name); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($sr->user->nal_id): ?>
                            <tr>
                                <td class="font-weight-bold">Nationality</td>
                                <td><?php echo e($sr->user->nationality->name); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($sr->user->state_id): ?>
                            <tr>
                                <td class="font-weight-bold">State</td>
                                <td><?php echo e($sr->user->state->name); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($sr->user->lga_id): ?>
                            <tr>
                                <td class="font-weight-bold">LGA</td>
                                <td><?php echo e($sr->user->lga->name); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($sr->dorm_id): ?>
                                <tr>
                                    <td class="font-weight-bold">Dormitory</td>
                                    <td><?php echo e($sr->dorm->name.' '.$sr->dorm_room_no); ?></td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lav_sms\resources\views/pages/support_team/students/show.blade.php ENDPATH**/ ?>