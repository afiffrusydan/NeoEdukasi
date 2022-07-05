<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/icons/logo-ne.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ asset('css/student/tentorlist.css') }}" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    @php
        function getAge($dob)
        {
            $birthDate = $dob;
            $birthDate = explode('-', $birthDate);
            $age = date('md', date('U', mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date('md') ? date('Y') - $birthDate[0] - 1 : date('Y') - $birthDate[0];
            echo $age;
        }
    @endphp

    <!-- Team -->
    <section id="team">
        <div class="container">
            <h5 class="section-title h1">Daftar Tentor</h5>
            <div class="row">
                <!-- Team member -->
                @foreach ($tentorlist as $tentor)
                    <div class="col-12 col-xs-12 col-sm-12 col-md-4 py-2">
                        <div class="image-flip">
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="img-logo pb-5 text-left" alt="Responsive image"
                                                src="{{ asset('asset/images/logo/logo-horizontal.png') }}">
                                            <p class="text-center"><img class="img-fluid img-avatar"
                                                    src="{{ asset('asset/images/avatars/avatar.png') }}"
                                                    alt="card image"></p>
                                            <h4 class="card-title pb-5 text-center">
                                                {{ $tentor->first_name . ' ' . $tentor->last_name }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="backside">
                                    <div class="card">
                                        <div class="card-body text-center mt-4">
                                            <h4 class="card-title">
                                                {{ $tentor->first_name . ' ' . $tentor->last_name }}
                                            </h4>
                                            <p class="card-text mt-5 pb-5">{{ $tentor->gender }}, Lulusan
                                                {{ $tentor->last_education }}, Umur
                                                {{ getAge($tentor->DOB) }} th, Kesibukan {{ $tentor->job_status }}</p>
                                            <ul class="list-inline mt-5 pb-3">
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank"
                                                        href="https://www.facebook.com/neoedukasiofficial">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank"
                                                        href="https://twitter.com/neo_edukasi">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a class="social-icon text-xs-center" target="_blank"
                                                        href="https://www.instagram.com/neoedukasi/">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Team -->
</body>

</html>
