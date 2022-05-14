<title>Tentor Verification</title>
@extends('tentor.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Lowongan Pekerjaan
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('tentor.vacancy.index') }}">Lowongan Pekerjaan</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <div class="row push">
            <div class="col-xl-2 order-xl-1">
                <div class="block block-rounded js-ecom-div-nav d-none d-xl-block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-fw fa-boxes text-muted me-1"></i> Menu
                        </h3>
                    </div>
                    <div class="block-content">
                        <ul class="nav nav-pills flex-column push">
                            <li class="nav-item mb-1">
                                <a class="nav-link d-flex justify-content-between align-items-center"
                                    href="javascript:void(0)">
                                    Filter
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 order-xl-0">
                <div class="row items-push">
                    @foreach ($vacancys as $vacancy)
                        <div class="col-md-6 col-xl-4">
                            <a class="block block-rounded block-link-shadow" href="{{ route('tentor.vacancy.detail', ['id' => $vacancy->vacancyId])}}">

                            <div class="block block-rounded h-100  border-left-neo">
                                <div class="block-content">
                                    <div class="row">
                                        <div class="col-xl-12 row">
                                            <div class="col-3 col-xl-3">
                                                <img class="rounded"
                                                    src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="max-width:130%;">
                                            </div>
                                            <div class="col-9 col-xl-9 font-w500 tittle-neo">
                                                {{ $vacancy->first_name.' '.$vacancy->last_name }}
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="tittle-neo"> Adress
                                                </div>
                                                <div class="tittle-vacancy h6">
                                                    {{ $vacancy->address }}    
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="tittle-neo"> Class
                                                </div>
                                                <div class="tittle-vacancy h6">
                                                    {{ $vacancy->class }}  
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="tittle-neo"> Curiculum
                                                </div>
                                                <div class="tittle-vacancy h6">
                                                    {{ $vacancy->curriculum }}  
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="tittle-neo"> Subject
                                                </div>
                                                <div class="tittle-vacancy h6">
                                                    {{ $vacancy->subject }}  </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="tittle-neo"> Criteria
                                                </div>
                                                <div class="tittle-vacancy h6">
                                                    <ul>
                                                        @foreach (explode('~', $vacancy->criteria) as $criteria)
                                                        <li class="font-size-md text-muted py-1"> {{ $criteria }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
