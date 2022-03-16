@include('tentor.layouts.sidebar')
<main id="main-container">
    @include('sweetalert::alert')
    @yield('content')
</main>
@include('tentor.layouts.footer')
