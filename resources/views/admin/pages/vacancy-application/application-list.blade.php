@extends('admin.layouts.app')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection


@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Applicant List
                    </h1>
                    <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                        list of tentors applying for jobs
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.vacancy.job-vacancy.index') }}">Job Vacancy</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Applicant List
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
                        <div class="table-responsive py-1">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%;">#</th>
                                        <th style="width: 15%;">Full Name</th>
                                        <th style="width: 5%;">Last Education</th>
                                        <th style="width: 5%;">Job Status</th>
                                        <th style="width: 5%;">Branch</th>
                                        <th style="width: 10%;">Status</th>
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
                                                    <button type="button" class="btn btn-md btn-alt-secondary"
                                                        data-bs-toggle="tooltip" title="Detail">
                                                        <a href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}"
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
        </div>
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

