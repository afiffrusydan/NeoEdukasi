@extends('admin.layouts.app')
<title>Daftar Siswa Aktif</title>
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
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor"
                style="
                    background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Daftar Siswa
                        </h1>
                    </div>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="{{ route('admin.student.all.all') }}">Daftar Siswa</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-0 col-md-4"></div>
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <select id='subject' class="form-control">
                                <option selected disabled value="">Mapel</option>
                                @foreach ($subject as $subject)
                                    <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <select id='status' class="form-control">
                                <option selected disabled value="">Status</option>
                                <option value="100">Aktif</option>
                                <option value="-100">Tidak Aktifr</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="button" id="test" class="btn btn-neo btn-sm btn-block" title="Add New Student">
                            Reset
                        </button>
                    </div>
                </div>
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="row">
                    <div class="col-md-12">
                        <table
                            class="table table-bordered table-striped table-vcenter js-dataTable-full no-footer dtr-inline collapsed data-table">
                            <thead>
                                <tr>
                                    <th style="width: 15%;">Nama Siswa</th>
                                    <th style="width: 15%;">Nama Tentor</th>
                                    <th style="width: 10%;">Mata Pelajaran</th>
                                    <th style="width: 10%;">Cabang</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ route('admin.student.tentored-students.index') }}",
                    data: function(d) {
                        d.status = $('#status').val(),
                            d.branch = $('#branch').val(),
                            d.subject = $('#subject').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columnDefs: [{
                    className: "text-center",
                    targets: [3, 4],
                }, {
                    targets: [0, 1, 2, 3, 4,5],
                    className: 'desktop'
                }, {
                    targets: [0, 1,2, 3],
                    className: 'not-desktop'
                }, ],

                columns: [{
                        data: 'full_name',
                        name: 'full_name',
                        orderable: true,
                        searchable: true
                    },{
                        data: 'tentor_name',
                        name: 'tentor_name',
                        orderable: true,
                        searchable: true
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'status',
                        name: 'status',
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
            $('#subject').change(function() {
                table.draw();
            });
            $('#test').click(function() {
                $('#status option,#subject option,#branch option').prop('selected', function() {
                    return this.defaultSelected;
                });
                $('#search').val('');
                table.search('').draw(); //required after
            });
        });
    </script>
@endsection
