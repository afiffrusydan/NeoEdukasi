@include('admin.layouts.right_sidebar')
@include('admin.layouts.left_sidebar')
@include('admin.layouts.header')
<main id="main-container">
    @include('sweetalert::alert')
    @yield('content')
</main>
@include('admin.layouts.footer')
