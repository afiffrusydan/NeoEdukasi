<title>Lowongan Pekerjaan</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
            background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Lowongan Pekerjaan
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Lowongan Pekerjaan</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->
        <!-- Dynamic Table Full -->
        <div class="block block-rounded shadow-sm">
            <div class="block-content block-content-full" >
                <div class="row">
                    <div class="col-xl-12 order-xl-0">
                        <div class="row items-push float-sm-right ">
                            <button type="button" class="btn btn-sm btn-alt-secondary" title="Add New Student">
                                <a href="{{ route('admin.vacancy.job-vacancy.create1') }}"
                                    class="btn btn-sm btn-neo pull-right">Tambah Lowongan Pekerjaan</a>
                            </button>
                        </div>
                        <h4 class="tittle-neo my-2">
                            Lowongan Pekerjaan
                        </h4>
                    </div>

                </div>
            </div>
        </div>

        @foreach ($vacancys as $vacancy)
        <a class=" " href="{{ route('admin.vacancy.job-vacancy.show', ['id'=>$vacancy->id])}}">
            <div class="block block-rounded shadow-sm">
                <div class="content content-full bg-header-tentor border-left-neo2" style="
            background-image:url({{ asset('images/Asset/header-tentors-detail-big-2.png') }});">
                    <div class="row">
                        <div class="col-xl-9 order-xl-0">
                            <div class="text-neo">
                                <h3 style="color: #6fa306">{{ $vacancy->first_name.' '.$vacancy->last_name }}</h3>
                            </div>
                            <div class="mb-0 h6 text-black-50 ">
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
                                <a href="{{ route('admin.vacancy.job-vacancy.show', ['id'=>$vacancy->id]) }}">Detail</a>
                            </div>
                        </div>

                        <div class="col-xl-3  text-center">
                            <div style="font-size: 70px">
                                {{ \App\Http\Controllers\Admin\Admin_VacancyController::getApplicant($vacancy->id) }}
                            </div>
                            Pelamar
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

