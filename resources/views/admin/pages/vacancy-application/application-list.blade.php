<title>Daftar Pelamar</title>
@extends('admin.layouts.app')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <!-- Hero -->
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
            background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Daftar Pelamar
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.vacancy.vacancy-application.index') }}">Lamaran Pekerjaan</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Daftar Pelamar
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="bg-white p-2 push">
                <div class="d-lg-none">
                    <button type="button"
                        class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
                        data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered"
                        data-class="d-none">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <nav>
                    <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
                        <ul class="nav nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx active" id="nav-interview-tab" data-toggle="tab"
                                    href="#nav-application" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                                    <span class="nav-main-link-name">Daftar Pelamar &nbsp</span>
                                    @if ($vacancy)
                                        <span class="badge badge-pill badge-info">{{ count($vacancy) }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-shortlist-tab" data-toggle="tab"
                                    href="#nav-shortlist" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-address-card"></i>
                                    <span class="nav-main-link-name">Daftar Pelamar Terpilih &nbsp</span>
                                    @isset($shortlist)
                                        <span class="badge badge-pill badge-info">{{ count($shortlist) }}</span>
                                    @endisset
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-application" role="tabpanel"
                aria-labelledby="nav-vacancyInformation-tab">
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="table-responsive py-1">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%;">#</th>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacancy as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="font-w600 fw-semibold">
                                                <a
                                                href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->last_education) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->job_status) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->branch_name) }}
                                            </td>
                                            <td class="fs-sm text-center">
                                                @if ($data->status == 50)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Shortlist</span>
                                                @elseif ($data->status == -100)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @else
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-danger">Submit</span>
                                                @endif
                                            </td>
                                            <td class="d-sm-table-cell text-center">
                                                <div class="btn-group center">
                                                        <a href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}"
                                                            class="btn btn-sm btn-neo pull-right">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade" id="nav-shortlist" role="tabpanel"
                aria-labelledby="nav-shortlist-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="table-responsive py-1">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%;">#</th>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shortlist as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="font-w600 fw-semibold">
                                                <a
                                                href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->last_education) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->job_status) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->branch_name) }}
                                            </td>
                                            <td class="fs-sm text-center">
                                                @if ($data->status == 50)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Terpilih</span>
                                                @elseif ($data->status == -100)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @else
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-danger">Submit</span>
                                                @endif
                                            </td>
                                            <td class="d-sm-table-cell text-center">
                                                <div class="btn-group center">
                                                        <a href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}"
                                                            class="btn btn-sm btn-neo pull-right">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="table-responsive py-1">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%;">#</th>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vacancy as $data)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="font-w600 fw-semibold">
                                                <a
                                                href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->last_education) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->job_status) }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ ucwords($data->branch_name) }}
                                            </td>
                                            <td class="fs-sm text-center">
                                                @if ($data->status == 10 OR $data->status == 0)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Interview</span>
                                                @elseif ($data->status == -100)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @elseif ($data->status == 100)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Pass Selection</span>
                                                @elseif ($data->status == 50)
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Interviewed</span>
                                                @else
                                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-danger">Submit</span>
                                                @endif
                                            </td>
                                            <td class="d-sm-table-cell text-center">
                                                <div class="btn-group center">
                                                        <a href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}"
                                                            class="btn btn-sm btn-neo pull-right">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
    @section('js_after')
        <!-- Page JS Plugins -->
        <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    
        <!-- Page JS Code -->
        <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    @endsection
@endsection

