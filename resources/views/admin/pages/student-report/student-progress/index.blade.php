@extends('admin.layouts.app')
<title>Laporan Perkembangan Siswa</title>
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
    <div class="content">
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
                                    background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Laporan Perkembangan Siswa
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx"
                                    href="{{ route('admin.student-report.student-progress.index') }}">Tentored Student
                                    List</a>
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
                        <table
                            class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell fs-sm text-center" style="width: 1%;">#</th>
                                    <th style="width: 15%;">Nama Siswa</th>
                                    <th style="width: 15%;">Nama Tentor</th>
                                    <th style="width: 10%;">Mata Pelajaran</th>
                                    <th class="d-sm-table-cell fs-sm" style="width: 5%;">Bulan</th>
                                    <th class="d-none d-sm-table-cell fs-sm" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $studentProgress)
                                    <tr>
                                        <td class="d-none d-md-table-cell fs-sm text-center">{{ $loop->iteration }}</td>
                                        <td class="fs-sm">
                                            <a
                                                href="{{ route('admin.student-report.student-progress.view', ['id' => $studentProgress->id]) }}">{{ $studentProgress->stdFirstName . ' ' . $studentProgress->stdLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            <a
                                                href="{{ route('admin.student-report.student-progress.view', ['id' => $studentProgress->id]) }}">{{ $studentProgress->tntrFirstName . ' ' . $studentProgress->tntrLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            {{ $studentProgress->subject }}
                                        </td>
                                        <td class="fs-sm">
                                            {{ date('F Y', strtotime($studentProgress->month)) }}
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-sm text-center">
                                            <a href="{{ route('admin.student-report.student-progress.view', ['id' => $studentProgress->id]) }}"
                                                class="btn btn-sm btn-neo">Detail</a>
                                            <button type="button" value="{{ $studentProgress->id }}" id="sendreport" class="btn btn-sm btn-neo">
                                                Kirim Ke Wa
                                            </button>
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

    <script>
        $("#sendreport").click(function(event) {
        event.preventDefault();
        let id = $(this).val();
        Swal.fire({
            title: "",
            text: "Please wait",
            imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
            showConfirmButton: false,
            allowOutsideClick: false
        });
        $.ajax({
            url: "{{ route('admin.student-report.student-progress.detail') }}",
            type: "POST",
            data: {
                id: id,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                Swal.fire({
                    title: 'Response Status :',
                    text: data,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 3000
                });
            },
            error: function(error) {
                Swal.fire({
                    title: 'Response Status :',
                    text: error,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        });
        });
    </script>
@endsection
