<title>Daftar Tentor</title>
@extends('admin.layouts.app')

@section('css_before')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
@endsection

@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@endsection

@section('content')
    <div class="content">
        <div class="bg-body-light block shadow-sm">
            <div class="content content-full bg-header-tentor"
                style="
                        background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Daftar Tentor
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tentor List</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="bg-white p-2 push">
                <div class="d-lg-none">
                    <button type="button"
                        class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
                        data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered" data-class="d-none">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <nav>
                    <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
                        <ul class="nav nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx active" id="nav-interview-tab" data-toggle="tab"
                                    href="#nav-application" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                                    <span class="nav-main-link-name">Daftar Pelamar &nbsp</span>
                                    @if ($vacancy)
                                        <span class="badge badge-pill badge-info">{{ count($vacancy) }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-shortlist-tab" data-toggle="tab"
                                    href="#nav-shortlist" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-address-card"></i>
                                    <span class="nav-main-link-name">Daftar Pelamar Terpilih &nbsp</span>
                                    @isset($shortlist)
                                        <span class="badge badge-pill badge-info">{{ count($shortlist) }}</span>
                                    @endisset
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-application" role="tabpanel"
                aria-labelledby="nav-vacancyInformation-tab">
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-0 col-md-5"></div>

                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <select id='branch' class="form-control">
                                    <option selected disabled value="">Cabang</option>
                                    @foreach ($branchs as $branch)
                                        <option value="{{ $branch->branch_id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <select id='status' class="form-control">
                                    <option selected disabled value="">Status</option>
                                    <option value="-10">Submit</option>
                                    <option value="50">Terpilih</option>
                                    <option value="-100">Ditolak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="button" id="test" class="btn btn-neo btn-sm btn-block mt-1"
                                title="Add New Student">
                                Reset
                            </button>
                        </div>
                    </div>
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="row">
                        <div class="col-md-12">
                            <table id="applicant-list" 
                                class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed data-table"  style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade" id="nav-shortlist" role="tabpanel"
                aria-labelledby="nav-shortlist-tab">
                <!-- Dynamic Table Full -->
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="row">
                        <div class="col-md-12">
                            <table id="selected-applicant-list"
                                class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed data-table">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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
    <script type="text/javascript">
        $(function() {
            var table = $('#applicant-list').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('admin.vacancy.vacancy-application.show', ['id' => $id]) }}",
                    data: function(d) {
                        d.type = 'applicant-list';
                        d.status = $('#status').val(),
                            d.branch = $('#branch').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columnDefs: [{
                    className: "text-center",
                    targets: [3, 4],
                }, {
                    targets: [0, 1, 2, 3, 4, 5],
                    className: 'desktop'
                }, {
                    targets: [0, 1, 2, 3],
                    className: 'not-desktop'
                }, ],
                columns: [{
                        data: 'full_name',
                        name: 'first_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'last_education',
                        name: 'last_education'
                    },
                    {
                        data: 'job_status',
                        name: 'job_status'
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#status').change(function() {
                table.draw();
            });
            $('#branch').change(function() {
                table.draw();
            });
            $('#test').click(function() {
                $('#status option,#branch option').prop('selected', function() {
                    return this.defaultSelected;
                });
                $('#search').val('');
                table.search('').draw(); //required after
            });
        });
        $(function() {
            var table = $('#selected-applicant-list').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                autoWidth: false,
                responsive: true,
                ajax: {
                    url: "{{ route('admin.vacancy.vacancy-application.show', ['id' => $id]) }}",
                    data: function(d) {
                        d.type = 'selected-applicant-list';
                        d.status = $('#status').val(),
                            d.branch = $('#branch').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columnDefs: [{
                    className: "text-center",
                    targets: [3, 4],
                }, {
                    targets: [0, 1, 2, 3, 4, 5],
                    className: 'desktop'
                }, {
                    targets: [0, 1, 2, 3],
                    className: 'not-desktop'
                }, ],
                columns: [{
                        data: 'full_name',
                        name: 'first_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'last_education',
                        name: 'last_education'
                    },
                    {
                        data: 'job_status',
                        name: 'job_status'
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
