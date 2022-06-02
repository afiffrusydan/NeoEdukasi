<title>Interview Lowongan Pekerjaan</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
                background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Interview Lowongan Pekerjaan
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.vacancy.interview.index') }}">Interview Lowongan Pekerjaan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Dynamic Table Full -->


        @foreach ($vacancys as $vacancy)
            <a class="" href="{{ route('admin.vacancy.interview.show', ['id' => $vacancy->id]) }}">
                <div class="block block-rounded shadow-sm">
                    <div class="content content-full bg-header-tentor border-left-neo2" style="
                    background-image:url({{ asset('images/Asset/header-tentors-detail-big-2.png') }});">
                        <div class="row">
                            <div class="col-xl-9 order-xl-0">
                                <div class="mb-1 h4 text-black-75 py-2" style="color: #6fa306">
                                    <label
                                        class="neo">{{ $vacancy->first_name . ' ' . $vacancy->last_name }}</label>
                                </div>
                                <div class="mb-0 h6 text-black-50">
                                    @if ($vacancy->status == -10)
                                        {{ 'Open' }}
                                    @else
                                        {{ 'Closed' }}
                                    @endif
                                </div>
                                <div class="mb-1 h6 text-black-50 py-1">
                                    {{ $vacancy->created_at }}
                                </div>

                                <div>
                                    <a class="h6 neo"
                                        href="{{ route('admin.vacancy.interview.show', ['id' => $vacancy->id]) }}">Tampilkan Pelamar</a>
                                </div>
                            </div>

                            <div class="col-xl-3  text-center">
                                <div style="font-size: 70px">
                                    {{ \App\Http\Controllers\Admin\Admin_VacancyInterview::getApplicant($vacancy->id) }}
                                </div>
                                Interview
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
