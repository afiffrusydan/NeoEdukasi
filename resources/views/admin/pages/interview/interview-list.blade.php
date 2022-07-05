@extends('admin.layouts.app')
<title>Daftar Interview</title>
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection
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

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
            background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Daftar Interview
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.vacancy.interview.index') }}">Interview Lowongan Pekerjaan</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Daftar Interview
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="bg-white p-2 push">
                <div class="d-lg-none">
                    <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
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
                                    href="#nav-interview" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                                    <span class="nav-main-link-name">Interview &nbsp</span>
                                    @if ($vacancy)
                                    <span class="badge badge-pill badge-info">{{ count($vacancy) }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-shortlist-tab" data-toggle="tab" href="#nav-shortlist"
                                    role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-address-card"></i>
                                    <span class="nav-main-link-name">Shortlist &nbsp</span>
                                    @isset($shortlist)
                                        <span class="badge badge-pill badge-info">{{ count($shortlist) }}</span>
                                    @endisset
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-interview" role="tabpanel"
            aria-labelledby="nav-vacancyInformation-tab">
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12 ">
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
                                                    href="{{ route('admin.vacancy.interview.detail', ['appId' => $data->appId]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
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
                                                @if ($data->status == 10 or $data->status == 0)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Interview</span>
                                                @elseif ($data->status == -100)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @elseif ($data->status == 100)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Pass
                                                        Selection</span>
                                                @else
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-danger">Submit</span>
                                                @endif
                                            </td>
                                            <td class="d-sm-table-cell text-center">
                                                <div class="btn-group center">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-toggle="tooltip" title="Detail">
                                                        <a href="{{ route('admin.vacancy.interview.detail', ['appId' => $data->appId]) }}"
                                                            class="btn btn-sm btn-neo pull-right">Detail</a>
                                                    </button>
                                                    {{-- <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-toggle="tooltip" title="Detail">
                                                        <a href="https://api.whatsapp.com/send?phone={{ $data->phone_number }}"
                                                            target="_blank"
                                                            class="btn btn-sm btn-neo pull-right">Whatsapp</a>
                                                    </button> --}}
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
        <div class="col-xl-12 order-xl-0 tab-pane fade" id="nav-shortlist" role="tabpanel"
            aria-labelledby="nav-shortlist-tab">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="row g-3 col-12 ">
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
                                                href="{{ route('admin.vacancy.interview.detail', ['appId' => $data->appId]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
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
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Interview</span>
                                            @else ($data->status == -100)
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Interviewed</span>
                                            @endif
                                        </td>
                                        <td class="d-sm-table-cell text-center">
                                            <div class="btn-group center">
                                                <button type="button" class="btn btn-sm btn-alt-secondary"
                                                    data-bs-toggle="tooltip" title="Detail">
                                                    <a href="{{ route('admin.vacancy.interview.detail', ['appId' => $data->appId]) }}"
                                                        class="btn btn-sm btn-neo pull-right">Detail</a>
                                                </button>
                                                {{-- <button type="button" class="btn btn-sm btn-alt-secondary"
                                                    data-bs-toggle="tooltip" title="Detail">
                                                    <a href="https://api.whatsapp.com/send?phone={{ $data->phone_number }}"
                                                        target="_blank"
                                                        class="btn btn-sm btn-neo pull-right">Whatsapp</a>
                                                </button> --}}
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
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

@endsection
