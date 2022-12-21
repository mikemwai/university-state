
<?php $__env->startSection('page_title', 'Graduated Students'); ?>
<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">Students Graduated</h6>
        <?php echo Qs::getPanelOptions(); ?>

    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight">
            <li class="nav-item"><a href="#all-students" class="nav-link active" data-toggle="tab">All Graduated Students</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Select Class</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <?php $__currentLoopData = $my_classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="#c<?php echo e($c->id); ?>" class="dropdown-item" data-toggle="tab"><?php echo e($c->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all-students">
                <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Section</th>
                        <th>Grad Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="<?php echo e($s->user->photo); ?>" alt="photo"></td>
                        <td><?php echo e($s->user->name); ?></td>
                        <td><?php echo e($s->adm_no); ?></td>
                        <td><?php echo e($s->my_class->name.' '.$s->section->name); ?></td>
                        <td><?php echo e($s->grad_date); ?></td>
                        <td class="text-center">
                            <div class="list-icons">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-left">
                                        <a href="<?php echo e(route('students.show', Qs::hash($s->id))); ?>" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                        <?php if(Qs::userIsTeamSA()): ?>
                                        <a href="<?php echo e(route('students.edit', Qs::hash($s->id))); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                        <a href="<?php echo e(route('st.reset_pass', Qs::hash($s->user->id))); ?>" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>

                                        
                                        <a id="<?php echo e(Qs::hash($s->id)); ?>" href="#" onclick="$('form#ng-'+this.id).submit();" class="dropdown-item"><i class="icon-stairs-down"></i> Not Graduated</a>
                                            <form method="post" id="ng-<?php echo e(Qs::hash($s->id)); ?>" action="<?php echo e(route('st.not_graduated', Qs::hash($s->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('put'); ?></form>
                                        <?php endif; ?>

                                        <a target="_blank" href="<?php echo e(route('marks.year_selector', Qs::hash($s->user->id))); ?>" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                        
                                        <?php if(Qs::userIsSuperAdmin()): ?>
                                        <a id="<?php echo e(Qs::hash($s->user->id)); ?>" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                        <form method="post" id="item-delete-<?php echo e(Qs::hash($s->user->id)); ?>" action="<?php echo e(route('students.destroy', Qs::hash($s->user->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>
                                        <?php endif; ?>
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
            <div class="tab-pane fade" id="c<?php echo e($mc->id); ?>">                                      <table class="table datatable-button-html5-columns">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>ADM_No</th>
                        <th>Section</th>
                        <th>Grad Year</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $students->where('my_class_id', $mc->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><img class="rounded-circle" style="height: 40px; width: 40px;" src="<?php echo e($s->user->photo); ?>" alt="photo"></td>
                            <td><?php echo e($s->user->name); ?></td>
                            <td><?php echo e($s->adm_no); ?></td>
                            <td><?php echo e($s->my_class->name.' '.$s->section->name); ?></td>
                            <td><?php echo e($s->grad_date); ?></td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-left">
                                            <a href="<?php echo e(route('students.show', Qs::hash($s->id))); ?>" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                            <?php if(Qs::userIsTeamSA()): ?>
                                                <a href="<?php echo e(route('students.edit', Qs::hash($s->id))); ?>" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('st.reset_pass', Qs::hash($s->user->id))); ?>" class="dropdown-item"><i class="icon-lock"></i> Reset password</a>

                                                
                                                <a id="<?php echo e(Qs::hash($s->id)); ?>" href="#" onclick="$('form#ng-'+this.id).submit();" class="dropdown-item"><i class="icon-stairs-down"></i> Not Graduated</a>
                                                <form method="post" id="ng-<?php echo e(Qs::hash($s->id)); ?>" action="<?php echo e(route('st.not_graduated', Qs::hash($s->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('put'); ?></form>
                                            <?php endif; ?>

                                            <a target="_blank" href="<?php echo e(route('marks.year_selector', Qs::hash($s->user->id))); ?>" class="dropdown-item"><i class="icon-check"></i> Marksheet</a>

                                            
                                            <?php if(Qs::userIsSuperAdmin()): ?>
                                                <a id="<?php echo e(Qs::hash($s->user->id)); ?>" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-<?php echo e(Qs::hash($s->user->id)); ?>" action="<?php echo e(route('students.destroy', Qs::hash($s->user->id))); ?>" class="hidden"><?php echo csrf_field(); ?> <?php echo method_field('delete'); ?></form>
                                            <?php endif; ?>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/pages/support_team/students/graduated.blade.php ENDPATH**/ ?>