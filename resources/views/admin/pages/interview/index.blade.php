<title>Interview Tentor</title>
@extends('admin.layouts.app')
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
        <!-- Hero -->
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor"
                style="
                background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Interview Tentor
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
                                <a class="link-fx" href="{{ route('admin.tentor-interview.index') }}">Interview Tentor</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
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
                                            <th style="width: 15%;">Status</th>
                                            <th style="width: 10%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listInterview as $data)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="font-w600 fw-semibold">
                                                    <a
                                                        href="{{ route('admin.tentor-interview.detail', ['id' => $data->id]) }}">{{ $data->first_name . ' ' . $data->last_name }}</a>
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
                                                    <span class="span1 fs-xs fw-semibold d-inline-block py-1 px-3 bg-info-light text-info btn-block">Belum Interview</span>
                                                </td>
                                                <td class="d-sm-table-cell text-center">
                                                    <div class="btn-group center">
                                                        <button type="button" class="btn btn-sm btn-alt-secondary"
                                                            data-bs-toggle="tooltip" title="Detail">
                                                            <a href="{{ route('admin.tentor-interview.detail', ['id' => $data->id]) }}"
                                                                class="btn btn-sm btn-neo pull-right">Detail</a>
                                                        </button>
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
            <!-- END Dynamic Table Full -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
