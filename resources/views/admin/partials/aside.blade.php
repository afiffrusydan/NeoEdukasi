<aside class="main-sidebar">
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        @php
            $admin_role = Auth::user()->getRoleNames()->first();
        @endphp 
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Management Panel</li>

            <li class="{{ $nav == 'dashboard' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            @if ($admin_role=='customerservice' or $admin_role =='administrator')
            <li class="{{ $nav == 'students' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Student</span></a></li>
            @endif
        </ul>
    </section>
</aside>
