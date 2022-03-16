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
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Student Progress List <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">{{ ucwords(
                            Auth::user()->getRoleNames()->first(),
                        ) }}</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('admin.submission.salary-submission.index') }}">Student Progress Report</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell fs-sm text-center" style="width: 1%;">#</th>
                                    <th style="width: 10%;">Tentor Name</th>
                                    <th style="width: 10%;">Student Name</th>
                                    <th style="width: 10%;">Subject</th>
                                    <th class="d-sm-table-cell fs-sm" style="width: 5%;">Month</th>
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
                                                href="{{ route('admin.submission.salary-submission.detail', ['id' => $studentProgress->id]) }}">{{ $studentProgress->tntrFirstName . ' ' . $studentProgress->tntrLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            <a
                                                href="{{ route('admin.submission.salary-submission.detail', ['id' => $studentProgress->id]) }}">{{ $studentProgress->stdFirstName . ' ' . $studentProgress->stdLastName }}</a>
                                        </td>
                                        <td class="fs-sm">
                                            {{ $studentProgress->subject }}
                                        </td>
                                        <td class="fs-sm">
                                            {{ date('F Y', strtotime($studentProgress->month)) }}
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-sm text-center">
                                            @if ($studentProgress->status == 0)
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Submitted</span>
                                            @elseif ($studentProgress->status == -10)
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                            @else
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Approved</span>
                                            @endif
                                        </td>
                                        <td class="d-none d-sm-table-cell fs-sm text-center">
                                            
                                                    <a href="{{ route('admin.submission.salary-submission.detail', ['id' => $studentProgress->id]) }}"
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
