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
                        <li class="nav-main-item tab-pane">
                            <a class="nav-main-link link-fx active tab-pane" id="nav-interview-tab" data-toggle="tab"
                                href="#nav-interview" role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="nav-main-link-icon fa fa-paperclip"></i>
                                <span class="nav-main-link-name">Submission &nbsp</span>
                            </a>
                        </li>
                        <li class="nav-main-item tab-pane">
                            <a class="nav-main-link link-fx" id="nav-shortlist-tab" data-toggle="tab" href="#nav-shortlist"
                                role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="nav-main-link-icon fa fa-history"></i>
                                <span class="nav-main-link-name">History &nbsp</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            @if ($errors->has('errors'))
                <div class="block-content">
                        <div class="alert alert-danger text-center">{{ $errors->first('errors') }}</div>
                </div>
                <div class="error">{{ $errors->first('firstname') }}</div>
            @endif
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-interview" role="tabpanel"
                aria-labelledby="nav-vacancyInformation-tab">
                <div class="block">
                    <div class="block-content block-content-full">
                        <div class="row items-push float-end ">
                            <div class="col-12 col-md-3 py-2">
                                <a href="{{ route('admin.submission.salary-submission.create') }}"
                                    class="btn btn-sm btn-neo btn-block pull-right">Add New Submission</a>
                            </div>
                        </div>
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12 ">
                            <div class="table-responsive py-1">
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
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade " id="nav-shortlist" role="tabpanel"
                aria-labelledby="nav-shortlist-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12 ">
                            <div class="table-responsive py-1">
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
                                        @foreach ($history as $studentProgress)
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

            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
