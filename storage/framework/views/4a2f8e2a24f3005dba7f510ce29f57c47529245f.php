<?php
    $active_menu = session()->get('menu_active');
?>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="<?php echo e(($active_menu == 'dashboard') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(($active_menu == 'dashboard') ? 'active' : ''); ?>">
                        <i class="la la-dashboard"></i> 
                        <span> Dashboard</span>
                    </a>
                </li>
                <li class="menu-title"> 
                    <span>Employees</span>
                </li>
                <li class="submenu <?php echo e(($active_menu == 'employees' || $active_menu == 'employee-add') ? 'active' : ''); ?>">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul style="display: <?php echo e(($active_menu == 'employees' || $active_menu == 'employee-add') ? 'block' : 'none'); ?>;">
                        <li >
                            <a class="<?php echo e(($active_menu == 'employees') ? 'active' : ''); ?>" href="<?php echo e(route('admin.employees.index')); ?>">All Employees</a>
                        </li>
                        <li >
                            <a class="<?php echo e(($active_menu == 'add-employees') ? 'active' : ''); ?>" href="<?php echo e(route('admin.employees.index')); ?>">Add Employee</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo e(($active_menu == 'leave-applications') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.application.index')); ?>">
                        <i class="la la-user"></i> <span> Leave Applications</span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'attendance') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.attendance.index')); ?>">
                        <i class="la la-user"></i> <span> Attendances</span>
                    </a>
                <li class="<?php echo e(($active_menu == 'departments') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('departments.index')); ?>">
                        <i class="la la-user"></i> <span> Departments</span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'designations') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('designations.index')); ?>">
                        <i class="la la-user"></i> <span> Designations</span>
                    </a>
                </li>
                
                <li class="submenu">
                    <a href="#">
                        <i class="la la-ticket"></i> 
                        <span> Launch Management</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: <?php echo e(($active_menu == 'launch_sheet' || 
                        $active_menu == 'launch_sheet_invoices' || 
                        $active_menu == 'launch_sheet_provider') ? 'block' : 'none'); ?>">
                        <li>
                            <a class="<?php echo e(($active_menu == 'launch_sheet') ? 'active' : ''); ?>" href="<?php echo e(route('admin.launch-sheet.index')); ?>">Launch Sheet</a>
                        </li>
                        <li >
                            <a class="<?php echo e(($active_menu == 'launch_sheet_invoices') ? 'active' : ''); ?>" href="<?php echo e(route('admin.launch-sheet.invoice')); ?>">Launch Invoice</a>
                        </li>
                        <li >
                            <a class="<?php echo e(($active_menu == 'launch_sheet_provider') ? 'active' : ''); ?>" href="<?php echo e(route('admin.launch-sheet.provider.index')); ?>">Launch Provider</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo e(($active_menu == 'client_accounts') ? 'active' : ''); ?>"> 
                    <a href="<?php echo e(route('admin.client-accounts.index')); ?>"><i class="la la-users"></i> <span>Clients</span></a>
                </li>

                <li class="<?php echo e(($active_menu == 'task-submissions' || $active_menu == 'task-forms') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="la la-file-text"></i><span>Task Management</span><span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li class="<?php echo e(($active_menu == 'task-submissions') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.tasks.index')); ?>">
                                Daily Submissions
                            </a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'task-submissions') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.tasks.index')); ?>">
                                Daily Tasks
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="<?php echo e(($active_menu == 'list_meeting_notes' || $active_menu == 'meeting_notes') ? 'active' : ''); ?>">
                    <a href="#">
                        <i class="la la-files-o"></i><span>Meeting Notes</span><span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li class="<?php echo e(($active_menu == '') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.custom-weekly-report.generateReport')); ?>">All Meeting Notes</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'daily_sales') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.custom-daily-report.index')); ?>">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#">
                        <i class="la la-desktop"></i><span>PC Configurations</span><span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li class="<?php echo e(($active_menu == 'pc_configurations') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.computer-configurations.index')); ?>">All Configurations</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'daily_sales') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.computer-configurations.create')); ?>">Add New</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'pc_configurations_requests') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.computer-configurations.requests')); ?>">View Requests</a>
                        </li>
                    </ul>
                </li>
                
                <li class="menu-title"> 
                    <span>HR</span>
                </li>
                <li class="<?php echo e(($active_menu == 'holidays') ? 'active' : ''); ?>">
                    <a class="" href="<?php echo e(route('holidays.index')); ?>">
                        <i class="la la-files-o"></i> <span> Holidays </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?php echo e(route('admin.payroll.index')); ?>"> Employee Salary </a></li>
                        <li><a href="salary-view.html"> Payslip </a></li>
                    </ul>
                </li>

                
                <li class="<?php echo e(($active_menu == 'custom-reports' || $active_menu == 'daily_sales' || $active_menu == 'weekly_generate' 
                    || $active_menu == 'pdf_reports') ? 'active' : ''); ?> submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="<?php echo e(($active_menu == 'weekly_generate') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.custom-weekly-report.generateReport')); ?>">Generate Reports</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'daily_sales') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.custom-daily-report.index')); ?>">Daily Reports</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'custom-reports') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.custom-weekly-report.generate.blank')); ?>">Custom Reports</a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'pdf_reports') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports.pdf.index')); ?>">Pdf Reports</a>
                        </li>
                    </ul>
                </li>
                
                <li class="<?php echo e(($active_menu == 'invoice-all' || $active_menu == 'invoice-add') ? 'active' : ''); ?> submenu">
                    <a href="#">
                        <i class="la la-file-text"></i> <span> Invoices </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li class="<?php echo e(($active_menu == 'invoice-all') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.invoice-management.index')); ?>"> View All </a>
                        </li>
                        <li class="<?php echo e(($active_menu == 'invoice-add') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.invoice-management.create')); ?>"> Add New </a>
                        </li>
                    </ul>
                </li>

                
                <li class="menu-title"> 
                    <span>Administration</span>
                </li>
                <li class="<?php echo e(($active_menu == 'administrative_users') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('administration.index')); ?>">
                        <i class="la la-user-plus"></i> <span> Users </span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'role_managers') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('roles.index')); ?>">
                        <i class="la la-question"></i> <span> Role Manager </span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'permission_managers') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('permissions.index')); ?>">
                        <i class="la la-key"></i> <span> Permission Manager </span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'company_policy') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('company-policy.index')); ?>">
                        <i class="la la-file-pdf-o"></i> <span> Company Policy </span>
                    </a>
                </li>
                <li class="<?php echo e(($active_menu == 'notice-board') ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('admin.notice-board.index')); ?>">
                        <i class="la la-file-pdf-o"></i> <span> Notice Board </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>