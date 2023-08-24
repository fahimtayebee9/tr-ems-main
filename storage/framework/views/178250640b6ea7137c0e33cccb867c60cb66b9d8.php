

<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Nik Patel</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <a href="pages-profile.html" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                    </a>
                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li>
                    <a href="<?php echo e(route('employee.dashboard')); ?>"
                        class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.dashboard' ? 'active' : ''); ?> waves-effect waves-light">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Apps</li>

                <li>
                    <a href="<?php echo e(route('employee.computer-configurations.index')); ?>"
                        class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.computer-configurations.index' ? 'active' : ''); ?>">
                        <i data-feather="layout"></i>
                        <span> PC Configuration </span>
                    </a>
                </li>

                <li class="<?php echo e((Route::getCurrentRoute()->getActionName() == 'employee.applications' || Route::getCurrentRoute()->getActionName() == 'employee.applications.create') ? 'nav-active' : ''); ?>">
                    <a href="#sidebarEmail" data-bs-toggle="collapse" 
                        class="waves-effect waves-light <?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.leave-management' ? 'active' : ''); ?>">
                        <i data-feather="mail"></i>
                        <span> Applications </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.applications' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('employee.applications')); ?>">All Applications</a>
                            </li>
                            <li
                                class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.applications.create' ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('employee.applications.create')); ?>">New Application</a>
                            </li>
                        </ul>
                    </div>                    
                </li>

                <li>
                    <a href="<?php echo e(route('employee.task-management')); ?>"
                        class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.task-management' ? 'active' : ''); ?> waves-effect waves-light">
                        <i data-feather="clipboard"></i>
                        <span> Task Board </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('employee.meeting-notes')); ?>"
                        class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.task-management' ? 'active' : ''); ?> waves-effect waves-light">
                        <i class="mdi mdi-google-pages"></i>
                        <span> Meeting Notes </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('employee.attendance')); ?>"
                        class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.attendance' ? 'active' : ''); ?>">
                        <i data-feather="file-text"></i>
                        <span> Attendance </span>
                    </a>
                </li>

                <li>
                    <a href="apps-file-manager.html">
                        <i data-feather="file-plus"></i>
                        <span> File Manager </span>
                    </a>
                </li>
                
                <li class="menu-title mt-2">Custom</li>

                <?php
                    $roleManager = \App\Models\RoleManager::where('id', \App\Models\Employee::where('user_id', Auth::user()->id)->first()->temporary_role)->first();
                ?>
                <?php if($roleManager != null && $roleManager->slug == 'launch-manager'): ?>
                    <li>
                        <a href="<?php echo e(route('employee.launch-sheet.index')); ?>"
                            class="<?php echo e(Route::getCurrentRoute()->getActionName() == 'employee.launch-sheet.index' ? 'active' : ''); ?>">
                            <i data-feather="layout"></i>
                            <span> Launch Sheet</span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="menu-title mt-2">Components</li>

                <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'nav-active-' : ''); ?>">
                    <a href="#sidebarReports" data-bs-toggle="collapse"
                        class="waves-effect waves-light <?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'active-' : ''); ?>">
                        <i data-feather="bar-chart-2"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarReports">
                        <ul class="list-unstyled" style="">
                            <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'active-' : ''); ?>">
                                <a href="<?php echo e(route('employee.reports.generate')); ?>">Generate Report</a>
                            </li>
                            <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'active-' : ''); ?>">
                                <a href="<?php echo e(route('employee.reports.dailySalesReports')); ?>">Daily Report</a>
                            </li>
                            <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'active-' : ''); ?>">
                                <a href="<?php echo e(__('0')); ?>">Weekly Report</a>
                            </li>
                            <li class="<?php echo e(Route::getCurrentRoute()->getActionName() == '' ? 'active-' : ''); ?>">
                                <a href="<?php echo e(__('0')); ?>">Report</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/employee/includes/sidebar.blade.php ENDPATH**/ ?>