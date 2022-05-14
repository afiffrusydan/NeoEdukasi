@include('tentor.layouts._common.common_header')
@include('tentor.layouts._common.common_side_header')
@php
$account_status = Auth::user()->account_status;
@endphp 

<!-- Side Content -->
<div class="content-side">
    <p>
        Content..
    </p>
</div>
<!-- END Side Content -->
</aside>
<!-- END Side Overlay -->

<!-- Sidebar -->
<!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-ne">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ route('tentor.dashboard') }}">
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">{{config('app.name')}}</span>
            </span>
        </a>
        <!-- Logo -->


    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('tentor.dashboard') }}">
                    <i class="nav-main-link-icon fa fa-home"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Menu</li>
            @if ($account_status >= 10)
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('tentor/vacancy/*') ? ' active' : '' }}" href="{{ route('tentor.vacancy.index') }}">
                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                    <span class="nav-main-link-name">Lowongan Pekerjaan</span>
                </a>
            </li>
            @endif

            @if ($account_status == 100)
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('tentor/student-progress-report/*') ? ' active' : '' }}" href="{{ route('tentor.progress-report.index') }}">
                    <i class="nav-main-link-icon fa fa-file"></i>
                    <span class="nav-main-link-name">Laporan Perkembangan Siswa</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('tentor/salary-submission/*') ? ' active' : '' }}" href="{{ route('tentor.salary-submission.index') }}">
                    <i class="nav-main-link-icon fa fa-book"></i>
                    <span class="nav-main-link-name">Pengajuan Gaji</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->

<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <!-- END Search Form -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">

            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="si si-bell"></i>
                    <span class="badge badge-primary badge-pill">6</span>
                </button>
                {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-primary text-center">
                        <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">

                        <!-- Notification Area -->
                        <li>
                            <a class="text-dark media py-2" href="javascript:void(0)">
                                <div class="mr-2 ml-3">
                                    <i class="fa fa-fw fa-check-circle text-success"></i>
                                </div>
                                <div class="media-body pr-2">
                                    <div class="font-w600">You have a new follower</div>
                                    <small class="text-muted">15 min ago</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2 border-top">
                        <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                        </a>
                    </div>
                </div> --}}
            </div>
            <!-- END Notifications Dropdown -->
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ml-2">
                <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 20px;">
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->first_name ." ". Auth::user()->last_name }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-primary">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('tentor.profile') }}">
                            <span>Profile</span>
                            <i class="si si-settings"></i>
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <h5 class="dropdown-header text-uppercase">Actions</h5>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('tentor.logout') }}" method='post'>
                            <span>Log Out</span>
                            <i class="si si-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->

    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-white">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-circle-notch fa-spin"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->

<!-- Main Container -->
