<title>Create New Job Vacancy</title>
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
                        <h1 class="h3 fw-bold mb-2">
                            Select Student For Job Vacancy
                        </h1>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.vacancy.job-vacancy.index') }}">Job
                                    Vacancy</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Select Student
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded shadow-sm">
            <div class="block-content block-content-full">
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
                                                <th style="width: 5%;">Class</th>
                                                <th style="width: 5%;">Branch</th>
                                                <th class="d-none d-sm-table-cell" style="width: 20%;">Address</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="font-w600 fw-semibold">
                                                        <a
                                                            href="{{ route('admin.vacancy.job-vacancy.create2', ['id' => $student->id]) }}">{{ $student->first_name . ' ' . $student->last_name }}</a>
                                                    </td>
                                                    <td class="fs-sm">
                                                        {{ $student->class }}
                                                    </td>
                                                    <td class="fs-sm">
                                                        {{ $student->branch_name }}
                                                    </td>
                                                    <td class="fs-sm">
                                                        {{ $student->address }}
                                                    </td>
                                                    <td class="d-sm-table-cell text-center">
                                                        <div class="btn-group center">
                                                            <button type="button" class="btn btn-md btn-alt-secondary"
                                                                data-bs-toggle="tooltip" title="Detail">
                                                                <a href="{{ route('admin.vacancy.job-vacancy.create2', ['id' => $student->id]) }}"
                                                                    class="btn btn-sm btn-neo pull-right">Select</a>
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
