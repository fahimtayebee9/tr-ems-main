<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">

            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                    <i data-feather="maximize"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i data-feather="bell"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">6</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="" class="text-dark"><small>Clear All</small></a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon">
                                <img src="assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon">
                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                            </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                            <div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
                            <p class="notify-details">
                                Jaclyn Brunswick commented on Dashboard<small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                            <div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
                            <p class="notify-details">
                                Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="uil uil-heart"></i>
                            </div>
                            <p class="notify-details">
                                Carlos Crouch liked <b>Admin</b> <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all <i class="fe-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if (Auth::user()->image)
                        <img src="{{ asset('storage/uploads/users/'.Auth::user()->image) }}" alt="user" class="rounded-circle">
                    @else
                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle">
                    @endif
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <i class="uil uil-angle-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="{{route('employee.profile')}}" class="dropdown-item notify-item">
                        <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                    </a>

                    <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                        <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <form class="dropdown-item notify-item" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a style="padding: 0px;" class="" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i data-feather="log-out" class="icon-dual icon-xs me-1"></i> <span>Logout</span>
                        </a>
                    </form>
                </div>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    @if (!empty(\App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo))
                        <img src="{{ asset('storage/uploads/company/' . \App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo) }}"
                            height="24" width="75%" alt="company logo" class="img-fluid w-50">
                    @else
                        <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" class="img-fluid w-50">
                    @endif
                </span>
                <span class="logo-lg">
                    @if (!empty(\App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo))
                        <img src="{{ asset('storage/uploads/company/' . \App\Models\CompanyDetail::orderby('id', 'desc')->first()->company_logo) }}"
                            height="24" width="75%" alt="company logo" class="img-fluid w-50">
                    @else
                        <img src="{{ asset('storage/assets/images/browser.png') }}" alt="company logo" class="img-fluid w-50">
                    @endif
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="" height="24">
                </span>
                <span class="logo-lg">
                    <img src="assets/images/logo-light.png" alt="" height="24">
                </span>
            </a>
        </div>

        {{-- LEFT SIDE --}}
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile">
                    <i data-feather="menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>