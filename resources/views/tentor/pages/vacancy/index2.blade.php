<title>Lowongan Pekerjaan Neo Edukasi</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block shadow-sm">
            <div class="bg-white">
                <div class="content content-full bg-header-tentor" style="
                background-image:url({{ asset('images/Asset/header-tentors-big.png') }});">
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
        </div>
        <div class="row push">
            <div class="order-1 col-12 col-xl-3 order-md-2">
                <div class="block block-rounded js-ecom-div-nav d-xl-block d-none shadow-sm">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fa fa-filter text-muted me-1"></i> Filter
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
            <div class="order-2 col-12 col-md-9 order-md-1">
                <div class="row">
                    @foreach ($vacancys as $vacancy)
                        <div class="col-md-12 pb-2">
                            <a class="shadow-sm"
                                href="{{ route('tentor.vacancy.detail', ['id' => Crypt::encrypt($vacancy->vacancyId)]) }}">

                                <div class="border-left-neo vacancy-section bg-white">
                                    <div class="block-content block-content-full">
                                        <div class="row">
                                            <div class="col-3 col-md-2 d-flex align-items-center justify-content-center">
                                                <img class="rounded"
                                                    src="{{ asset('images/Asset/logo-ne-notext.png') }}"
                                                    alt="Header Avatar" style="max-width:50%;">
                                            </div>
                                            <div class="col-9 col-md-10 vacancy-section-data pt-2">
                                                <div class="neo mb-1">
                                                    {{ $vacancy->first_name . ' ' . $vacancy->last_name }}
                                                </div>
                                                <div class="tittle-vacancy-section-branch mb-1">
                                                    {{ $vacancy->branch_name }}
                                                </div>
                                                <div class="tittle-vacancy-section-address">
                                                    {{ $vacancy->address }}
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
