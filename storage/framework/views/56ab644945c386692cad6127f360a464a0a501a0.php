<div class="sidebar sidebar-dark bg-success sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <!-- <div class="mr-3">
                        <a href="<?php echo e(route('my_account')); ?>"><img src="<?php echo e(Auth::user()->photo); ?>" width="38" height="38" class="rounded-circle" alt="photo"></a>
                    </div> -->

                    <div class="media-body">
                        <div class="media-title font-weight-semibold"><?php echo e(Auth::user()->name); ?></div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-user font-size-sm"></i> &nbsp;<?php echo e(ucwords(str_replace('_', ' ', Auth::user()->user_type))); ?>

                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="<?php echo e(route('my_account')); ?>" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e((Route::is('dashboard')) ? 'active' : ''); ?>">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                
                <?php if(Qs::userIsAcademic()): ?>
                    <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['tt.index', 'ttr.edit', 'ttr.show', 'ttr.manage']) ? 'nav-item-expanded nav-item-open' : ''); ?> ">
                        <a href="#" class="nav-link"><i class="icon-graduation2"></i> <span> Academics</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Academics">

                        
                            <li class="nav-item"><a href="<?php echo e(route('tt.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['tt.index']) ? 'active' : ''); ?>">Timetables</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>

                
                <?php if(Qs::userIsAdministrative()): ?>
                    <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.invoice', 'payments.receipts', 'payments.edit', 'payments.manage', 'payments.show',]) ? 'nav-item-expanded nav-item-open' : ''); ?> ">
                        <a href="#" class="nav-link"><i class="icon-office"></i> <span> Administrative</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Administrative">

                            
                            <?php if(Qs::userIsTeamAccount()): ?>
                            <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['payments.index', 'payments.create', 'payments.edit', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'nav-item-expanded' : ''); ?>">

                                <a href="#" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.create', 'payments.manage', 'payments.show', 'payments.invoice']) ? 'active' : ''); ?>">Payments</a>

                                <ul class="nav nav-group-sub">
                                    <li class="nav-item"><a href="<?php echo e(route('payments.create')); ?>" class="nav-link <?php echo e(Route::is('payments.create') ? 'active' : ''); ?>">Create Payment</a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('payments.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['payments.index', 'payments.edit', 'payments.show']) ? 'active' : ''); ?>">Manage Payments</a></li>
                                    <li class="nav-item"><a href="<?php echo e(route('payments.manage')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['payments.manage', 'payments.invoice', 'payments.receipts']) ? 'active' : ''); ?>">Student Payments</a></li>

                                </ul>

                            </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                
                <?php if(Qs::userIsTeamSAT()): ?>
                    <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['students.create', 'students.list', 'students.edit', 'students.show', 'students.promotion', 'students.promotion_manage', 'students.graduated']) ? 'nav-item-expanded nav-item-open' : ''); ?> ">
                        <a href="#" class="nav-link"><i class="icon-users"></i> <span> Students</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Manage Students">
                            
                            <?php if(Qs::userIsTeamSA()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('students.create')); ?>"
                                       class="nav-link <?php echo e((Route::is('students.create')) ? 'active' : ''); ?>">Admit Student</a>
                                </li>
                            <?php endif; ?>

                            
                            <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'nav-item-expanded' : ''); ?>">
                                <a href="#" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['students.list', 'students.edit', 'students.show']) ? 'active' : ''); ?>">Student Information</a>
                                <ul class="nav nav-group-sub">
                                    <?php $__currentLoopData = App\Models\MyClass::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item"><a href="<?php echo e(route('students.list', $c->id)); ?>" class="nav-link "><?php echo e($c->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>

                            <?php if(Qs::userIsTeamSA()): ?>

                            
                            <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage']) ? 'nav-item-expanded' : ''); ?>"><a href="#" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['students.promotion', 'students.promotion_manage' ]) ? 'active' : ''); ?>">Student Promotion</a>
                            <ul class="nav nav-group-sub">
                                <li class="nav-item"><a href="<?php echo e(route('students.promotion')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['students.promotion']) ? 'active' : ''); ?>">Promote Students</a></li>
                                <li class="nav-item"><a href="<?php echo e(route('students.promotion_manage')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['students.promotion_manage']) ? 'active' : ''); ?>">Manage Promotions</a></li>
                            </ul>

                            </li>

                            
                            <li class="nav-item"><a href="<?php echo e(route('students.graduated')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['students.graduated' ]) ? 'active' : ''); ?>">Students Graduated</a></li>
                                <?php endif; ?>

                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(Qs::userIsTeamSA()): ?>
                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('users.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['users.index', 'users.show', 'users.edit']) ? 'active' : ''); ?>"><i class="icon-users4"></i> <span> Users</span></a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('classes.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['classes.index','classes.edit']) ? 'active' : ''); ?>"><i class="icon-windows2"></i> <span> Classes</span></a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('dorms.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['dorms.index','dorms.edit']) ? 'active' : ''); ?>"><i class="icon-home9"></i> <span> Dormitories</span></a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('sections.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['sections.index','sections.edit',]) ? 'active' : ''); ?>"><i class="icon-fence"></i> <span>Sections</span></a>
                    </li>

                    
                    <li class="nav-item">
                        <a href="<?php echo e(route('subjects.index')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['subjects.index','subjects.edit',]) ? 'active' : ''); ?>"><i class="icon-pin"></i> <span>Subjects</span></a>
                    </li>
                <?php endif; ?>

                
                <?php if(Qs::userIsTeamSAT()): ?>
                <li class="nav-item nav-item-submenu <?php echo e(in_array(Route::currentRouteName(), ['exams.index', 'exams.edit', 'grades.index', 'grades.edit', 'marks.index', 'marks.manage', 'marks.bulk', 'marks.tabulation', 'marks.show', 'marks.batch_fix',]) ? 'nav-item-expanded nav-item-open' : ''); ?> ">
                    <a href="#" class="nav-link"><i class="icon-books"></i> <span> Exams</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Manage Exams">
                        <?php if(Qs::userIsTeamSA()): ?>

                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('exams.index')); ?>"
                                   class="nav-link <?php echo e((Route::is('exams.index')) ? 'active' : ''); ?>">Exam List</a>
                            </li>

                            
                            <li class="nav-item">
                                    <a href="<?php echo e(route('grades.index')); ?>"
                                       class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['grades.index', 'grades.edit']) ? 'active' : ''); ?>">Grades</a>
                            </li>

                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('marks.tabulation')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['marks.tabulation']) ? 'active' : ''); ?>">Tabulation Sheet</a>
                            </li>

                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('marks.batch_fix')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['marks.batch_fix']) ? 'active' : ''); ?>">Batch Fix</a>
                            </li>
                        <?php endif; ?>

                        <?php if(Qs::userIsTeamSAT()): ?>
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('marks.index')); ?>"
                                   class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['marks.index']) ? 'active' : ''); ?>">Marks</a>
                            </li>

                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('marks.bulk')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['marks.bulk', 'marks.show']) ? 'active' : ''); ?>">Marksheet</a>
                            </li>

                            <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>


                

                <?php echo $__env->make('pages.'.Qs::getUserType().'.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                
                <li class="nav-item">
                    <a href="<?php echo e(route('my_account')); ?>" class="nav-link <?php echo e(in_array(Route::currentRouteName(), ['my_account']) ? 'active' : ''); ?>"><i class="icon-user"></i> <span>My Account</span></a>
                </li>

                </ul>
            </div>
        </div>
</div>
<?php /**PATH C:\xampp\htdocs\SMS-IN-LARAVEL\resources\views/partials/menu.blade.php ENDPATH**/ ?>