@include('admin.layouts._common.common_header')
@include('admin.layouts._common.common_side_header')
@php
$admin_role = Auth::user()->getRoleNames()->first();
@endphp 


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
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="{{ route('admin.dashboard') }}">
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
                <a class="nav-main-link{{ request()->is('dashboard') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="nav-main-link-icon si si-home"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                </a>
            </li>
            <li class="nav-main-heading">Menu</li>
            <li class="nav-main-item{{ request()->is('examples/*') ? ' open' : '' }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-bulb"></i>
                    <span class="nav-main-link-name">Drop Down Menu</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('admin/pages/plugin-helper') ? ' active' : '' }}" href="/admin/plugin-helper">
                            <span class="nav-main-link-name">Plugin with JS Helper</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('admin/pages/plugin-init') ? ' active' : '' }}" href="/admin/plugin-init">
                            <span class="nav-main-link-name">Plugin with JS Init</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link{{ request()->is('admin/pages/blank') ? ' active' : '' }}" href="/admin/blank">
                            <span class="nav-main-link-name">Blank</span>
                        </a>
                    </li>
                </ul>
            </li>

            @if ($admin_role=='customerservice' or $admin_role =='administrator')
            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('Penjahit') ? ' active' : '' }}" href="{{ route('siswa.all') }}">
                    <i class="nav-main-link-icon si si-cursor"></i>
                    <span class="nav-main-link-name">Siswa</span>
                </a>
            </li>
            @endif

            <li class="nav-main-item">
                <a class="nav-main-link{{ request()->is('Kantin') ? ' active' : '' }}" href="/kantin">
                    <i class="nav-main-link-icon si si-cursor"></i>
                    <span class="nav-main-link-name">Other Menu</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->


<!-- END Header -->

<!-- Main Container -->
