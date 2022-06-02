@extends('admin.layouts.app')
<title>Daftar Siswa Aktif</title>
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
                            Daftar Siswa Aktif
                        </h1>
                    </div>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{ ucwords(
                                Auth::user()->getRoleNames()->first(),
                            ) }}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="#">Daftar Siswa Aktif</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
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
                                        <th style="width: 15%;">Nama Siswa</th>
                                        <th style="width: 15%;">Nama Tentor</th>
                                        <th class="d-none d-sm-table-cell" style="width: 20%;">Mata Pelajaran</th>
                                        <th style="width: 10%;">Cabang</th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="font-w600 fw-semibold">
                                                <a
                                                    href="#">{{ $student->stdFirstName . ' ' . $student->stdLastName }}</a>
                                            </td>
                                            <td class="font-w600 fw-semibold">
                                                <a
                                                    href="#">{{ $student->tntrFirstName . ' ' . $student->tntrLastName }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ $student->subject }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ $student->branch_name }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ $student->status }}
                                            </td>
                                            <td class="d-sm-table-cell text-center">
                                                <div class="btn-group center">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        data-bs-toggle="tooltip" title="Detail">
                                                        <a href="#" class="btn btn-sm btn-neo pull-right">Detail</a>
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
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
