<title>Pengajuan Laporan Perkembangan Siswa</title>
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
                            Pengajuan Laporan Perkembangan Siswa
                        </h1>
                    </div>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{ ucwords(
                                Auth::user()->getRoleNames()->first(),
                            ) }}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.submission.student-progress.index') }}">Pengajuan Laporan Perkembangan Siswa</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block shadow-sm">
                    <div class="block-content block-content-full border-right-neo">
                        <div class="row items-push float-end ">
                            <div class="col-12 col-md-4 py-2">
                                <a href="{{ route('admin.submission.student-progress.create') }}"
                                    class="btn btn-sm btn-neo btn-block pull-right">Tambah Laporan Perkembangan Siswa</a>
                            </div>
                        </div>
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell fs-sm text-center" style="width: 1%;">#</th>
                                    <th style="width: 10%;">Nama Tentor</th>
                                    <th style="width: 10%;">Nama Siswa</th>
                                    <th style="width: 10%;">Mata Pelajaran</th>
                                    <th class="d-sm-table-cell fs-sm" style="width: 5%;">Bulan</th>
                                    <th class="d-none d-sm-table-cell fs-sm" style="width: 5%;">Status</th>
                                    <th class="d-none d-sm-table-cell fs-sm" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $studentProgress)
                                    <tr>
                                        <td class="d-none d-md-table-cell fs-sm text-center">{{ $loop->iteration }}</td>
                                        <td class="fs-sm">
                                            <a
                                                href="{{ route('admin.submission.student-progress.detail', ['id' => $studentProgress->id]) }}">{{ $studentProgress->tntrFirstName . ' ' . $studentProgress->tntrLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            <a
                                                href="{{ route('admin.submission.student-progress.detail', ['id' => $studentProgress->id]) }}">{{ $studentProgress->stdFirstName . ' ' . $studentProgress->stdLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            {{ $studentProgress->subject }}
                                        </td>
                                        <td class="fs-sm">
                                            {{ date('F Y', strtotime($studentProgress->month)) }}
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-sm text-center">
                                            @if ($studentProgress->status == 0)
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Diajukan</span>
                                            @elseif ($studentProgress->status == -10)
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Ditolak</span>
                                            @else
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Diterima</span>
                                            @endif
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-sm text-center">
                                            
                                                    <a href="{{ route('admin.submission.student-progress.detail', ['id' => $studentProgress->id]) }}"
                                                        class="btn btn-sm btn-neo">Detail</a>
        
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
    <!-- END Page Content -->
@endsection
