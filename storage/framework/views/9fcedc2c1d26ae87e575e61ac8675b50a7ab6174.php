
<?php $__env->startSection('page_title', 'User Profile - '.$user->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <img style="width: 90%; height:90%" src="<?php echo e($user->photo); ?>" alt="photo" class="rounded-circle">
                    <br>
                    <h3 class="mt-3"><?php echo e($user->name); ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" ><?php echo e($user->name); ?></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        
                        <div class="tab-pane fade show active" id="basic-info">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="font-weight-bold">Name</td>
                                    <td><?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Gender</td>
                                    <td><?php echo e($user->gender); ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td><?php echo e($user->address); ?></td>
                                </tr>
                                <?php if($user->email): ?>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td><?php echo e($user->email); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->username): ?>
                                    <tr>
                                        <td class="font-weight-bold">Username</td>
                                        <td><?php echo e($user->username); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->phone): ?>
                                    <tr>
                                        <td class="font-weight-bold">Phone</td>
                                        <td><?php echo e($user->phone.' '.$user->phone2); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td class="font-weight-bold">Birthday</td>
                                    <td><?php echo e($user->dob); ?></td>
                                </tr>
                                <?php if($user->bg_id): ?>
                                    <tr>
                                        <td class="font-weight-bold">Blood Group</td>
                                        <td><?php echo e($user->blood_group->name); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->nal_id): ?>
                                    <tr>
                                        <td class="font-weight-bold">Nationality</td>
                                        <td><?php echo e($user->nationality->name); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->state_id): ?>
                                    <tr>
                                        <td class="font-weight-bold">State</td>
                                        <td><?php echo e($user->state->name); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->lga_id): ?>
                                    <tr>
                                        <td class="font-weight-bold">LGA</td>
                                        <td><?php echo e($user->lga->name); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($user->user_type == 'parent'): ?>
                                    <tr>
                                        <td class="font-weight-bold">Children/Ward</td>
                                        <td>
                                        <?php $__currentLoopData = Qs::findMyChildren($user->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span> - <a href="<?php echo e(route('students.show', Qs::hash($sr->id))); ?>"><?php echo e($sr->user->name.' - '.$sr->my_class->name. ' '.$sr->section->name); ?></a></span><br>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php if($user->user_type == 'teacher'): ?>
                                    <tr>
                                        <td class="font-weight-bold">My Subjects</td>
                                        <td>
                                            <?php $__currentLoopData = Qs::findTeacherSubjects($user->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span> - <?php echo e($sub->name.' ('.$sub->my_class->name.')'); ?></span><br>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\lav_sms\resources\views/pages/support_team/users/show.blade.php ENDPATH**/ ?>