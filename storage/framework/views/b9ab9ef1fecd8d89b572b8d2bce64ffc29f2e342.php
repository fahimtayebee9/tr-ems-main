

<div class="header">
			
    <!-- Logo -->
    <div class="header-left">
        <a href="index.html" class="logo">
            
            <?php if(!empty(\App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo)): ?>
                <img src="<?php echo e(asset('storage/uploads/company/'. \App\Models\CompanyDetail::orderby('id','desc')->first()->company_logo)); ?>" 
                    alt="company logo" class="w-25 img-fluid" height="40">
            <?php else: ?>
                <img src="<?php echo e(asset('storage/assets/images/browser.png')); ?>" alt="company logo" height="40" class="img-fluid w-50">
            <?php endif; ?>
        </a>
    </div>
    <!-- /Logo -->
    
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    
    <!-- Header Title -->
    <div class="page-title-box">
        <h3><?php echo e(\App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_name); ?></h3>
    </div>
    <!-- /Header Title -->
    
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    
    <!-- Header Menu -->
    <ul class="nav user-menu">
        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="activities.html">
                                <div class="media">
                                    <span class="avatar">
                                        <?php if(Auth::user()->image == null): ?>
                                            <img alt="" src="<?php echo e(asset('storage/uploads/users/default.webp')); ?>">
                                        <?php else: ?>
                                            <img alt="" src="<?php echo e(asset('storage/uploads/users/'. Auth::user()->image)); ?>">
                                        <?php endif; ?>
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="activities.html">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                        <?php if(Auth::user()->image == null): ?>
                            <img alt="" src="<?php echo e(asset('storage/uploads/users/default.webp')); ?>">
                        <?php else: ?>
                            <img alt="" src="<?php echo e(asset('storage/uploads/users/'. Auth::user()->image)); ?>">
                        <?php endif; ?>
                    <span class="status online"></span>
                </span>
                <span><?php echo e(Auth::user()->first_name); ?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <a class="dropdown-item" type="button" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-power-off"></i> LOGOUT
                    </a>
                </form>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
    
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="settings.html">Settings</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <a class="dropdown-item" type="button" href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fa fa-power-off"></i> LOGOUT
                </a>
            </form>
        </div>
    </div>
    <!-- /Mobile Menu -->
    
</div><?php /**PATH C:\xampp\htdocs\00_PROJECTS\tr-ems\resources\views/admin/includes/topbar.blade.php ENDPATH**/ ?>