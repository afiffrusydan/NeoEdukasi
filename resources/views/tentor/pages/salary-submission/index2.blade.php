<title>Salary Sumbission</title>
@extends('tentor.layouts.app')

@section('css_before')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}"> --}}
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}

    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full bg-header-tentor" style="
        background-image:url({{ asset('images/Asset/header-tentors.png') }});">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Student Progress List <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Salary Sumbission</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Home</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        <div class="bg-white push">
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
        <div class="block block-rounded tab-content py-3 row" id="nav-tabContent">
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
                                <a href="{{ route('tentor.salary-submission.addnew') }}"
                                    class="btn btn-sm btn-neo btn-block pull-right {{ $errors->has('errors') ? 'Disabled' : '' }}">Add
                                    New Submission</a>
                            </div>
                        </div>
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="table-responsive py-1">
                            <table id="example"
                                class="table table-bordered table-striped table-vcenter no-footer dtr-inline collapsed  display nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Month</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stdProgress as $studentProgress)
                                        <tr>
                                            <td class="fs-sm">
                                                <a class="font-size-h6"
                                                    href="javascript:void(0)">{{ $studentProgress->stdFirstName . ' ' . $studentProgress->stdLastName }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ $studentProgress->subject }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ date('F Y', strtotime($studentProgress->month)) }}
                                            </td>
                                            <td class="d-none d-sm-table-cell fs-sm text-center">
                                                @if ($studentProgress->status == 0)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Processed</span>
                                                @elseif ($studentProgress->status == -10)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @else
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Approved</span>
                                                @endif
                                            </td>
                                            <td class="d-none d-sm-table-cell fs-sm text-center">
                                                <a href="{{ route('tentor.salary-submission.detail', ['id' => $studentProgress->id]) }}"
                                                    class="btn btn-sm btn-neo{{ $studentProgress->status == -10 ? '' : ' disabled' }}">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
                        <div class="table-responsive py-1">
                            <table id="example"
                                class="table table-bordered table-striped table-vcenter no-footer dtr-inline collapsed  display nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Month</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $studentProgress)
                                        <tr>
                                            <td class="fs-sm">
                                                <a class="font-size-h6"
                                                    href="javascript:void(0)">{{ $studentProgress->stdFirstName . ' ' . $studentProgress->stdLastName }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ $studentProgress->subject }}
                                            </td>
                                            <td class="fs-sm">
                                                {{ date('F Y', strtotime($studentProgress->month)) }}
                                            </td>
                                            <td class="d-none d-sm-table-cell fs-sm text-center">
                                                @if ($studentProgress->status == 0)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Processed</span>
                                                @elseif ($studentProgress->status == -10)
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                                @else
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Approved</span>
                                                @endif
                                            </td>
                                            <td class="d-none d-sm-table-cell fs-sm text-center">
                                                <a href="{{ route('tentor.salary-submission.detail', ['id' => $studentProgress->id]) }}"
                                                    class="btn btn-sm btn-neo{{ $studentProgress->status == -10 ? '' : ' disabled' }}">Update</a>
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
    <!-- Page Content -->
    <!-- END Page Content -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
