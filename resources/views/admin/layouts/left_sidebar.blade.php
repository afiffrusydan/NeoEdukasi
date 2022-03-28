@include('admin.layouts._common.common_header')
@include('admin.layouts._common.common_side_header')
@php
$admin_role = Auth::user()->getRoleNames()->first();
@endphp 

<div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed page-header-dark">
    <!-- Side Overlay-->

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
<nav id="sidebar" aria-label="Main Navigation" class="smini-hidden">
    <!-- Side Header -->
    <div class="content-header bg-ne">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ route('admin.dashboard') }}">
            <span class="smini-hide">
                <span class="font-w700 font-size-h5">{{config('app.name')}}</span>
            </span>
        </a>
        <!-- Logo -->
        <div class="nav-toggle">
        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-fw fa-ellipsis-v"></i>
        </button>
        </div>

    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <a class="nav-main-link  {{ (request()->is('admin/dashboard')) ? 'active' : ''}}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-main-link-icon fa fa-home"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Menu</li>
           
            @if ($admin_role=='academic' or $admin_role =='administrator')
            <li class="nav-main-item   {{ (request()->is('admin/tentor/*')) ? 'open' : ''}} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Tentor</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Request::routeIs('admin.tentor.index') ? 'active' : '' }}" href="{{ route('admin.tentor.index') }}">
                            <span class="nav-main-link-name">Tentors</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ Request::routeIs('admin.tentor-verification.index') ? 'active' : '' }}" href="{{ route('admin.tentor-verification.index') }}">
                            <span class="nav-main-link-name">Tentor Account Verification</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            
            

           

            @if ($admin_role=='customerservice' or $admin_role =='administrator')
            <li class="nav-main-item   {{ (request()->is('admin/students/*')) ? 'open' : ''}} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Students Menu</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/students/all/*')) ? 'active' : ''}}" href="{{ route('admin.student.all.all') }}">
                            <span class="nav-main-link-name">Student</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/students/tentored-students/*')) ? 'active' : '' }}" href="{{ route('admin.student.tentored-students.index') }}">
                            <span class="nav-main-link-name">Tentored Students</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if ($admin_role=='customerservice' or $admin_role =='administrator' or $admin_role =='academic')
            <li class="nav-main-item   {{ (request()->is('admin/vacancy/*')) ? 'open' : ''}} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                    <span class="nav-main-link-name">Vacancy</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/vacancy/job-vacancy/*')) ? 'active' : '' }}" href="{{ route('admin.vacancy.job-vacancy.index') }}">
                            <span class="nav-main-link-name">Job Vacancy</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/vacancy/vacancy-application/*')) ? 'active' : '' }}" href="{{ route('admin.vacancy.vacancy-application.index') }}">
                            <span class="nav-main-link-name">Vacancy Application</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/vacancy/interview/*')) ? 'active' : '' }}" href="{{ route('admin.vacancy.interview.index') }}">
                            <span class="nav-main-link-name">Interview</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if ($admin_role=='customerservice' or $admin_role =='administrator' or $admin_role =='academic')
            <li class="nav-main-item   {{ (request()->is('admin/submission/*')) ? 'open' : ''}} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-file"></i>
                    <span class="nav-main-link-name">Submission</span>
                </a>
                {{-- <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/submission/student-progress/*')) ? 'active' : '' }}" href="{{ route('admin.submission.student-progress.index') }}">
                            <span class="nav-main-link-name">Student Progress Report</span>
                        </a>
                    </li>
                </ul> --}}
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/submission/salary-submission/*')) ? 'active' : '' }}" href="{{ route('admin.submission.salary-submission.index') }}">
                            <span class="nav-main-link-name">Salary Submission</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if ($admin_role=='customerservice' or $admin_role =='administrator' or $admin_role =='academic')
            <li class="nav-main-item   {{ (request()->is('admin/student-report/*')) ? 'open' : ''}} ">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon fa fa-flag"></i>
                    <span class="nav-main-link-name">Student Report</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link {{ (request()->is('admin/student-report/student-progress/*')) ? 'active' : '' }}" href="{{ route('admin.student-report.student-progress.index') }}">
                            <span class="nav-main-link-name">Student Progress Report</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->


<!-- END Header -->

<!-- Main Container -->
