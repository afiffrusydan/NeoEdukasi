<title>Verifikasi Akun Tentor</title>
@extends('admin.layouts.app'))

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
            <div class="content content-full bg-header-tentor" style="
                    background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Verifikasi Akun Tentor
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                {{ ucwords(
                                    Auth::user()->getRoleNames()->first(),
                                ) }}
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Verifikasi Akun Tentor</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-0 col-md-6"></div>

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
                                <option value="100">Aktif Mengajar</option>
                                <option value="-50">Belum Verifikasi</option>
                                <option value="0">Sudah Verifikasi</option>
                                <option value="50">Sudah Interview</option>
                                <option value="-100">Blacklsit</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-2">
                        <button type="button" id="test" class="btn btn-neo btn-sm btn-block mt-1" title="Add New Student">
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
                                    <th style="width: 15%;">Nama Lengkap</th>
                                    <th style="width: 10%;">Cabang</th>
                                    <th style="width: 15%;">Email</th>
                                    <th style="width: 15%;">Status</th>
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
                    url: "{{ route('admin.tentor.index') }}",
                    data: function(d) {
                        d.status = $('#status').val(),
                            d.branch = $('#branch').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columnDefs: [{
                    className: "text-center",
                    targets: [3, 4],
                }, {
                    targets: [0, 1, 2, 3, 4],
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
                    },
                    {
                        data: 'branch_name',
                        name: 'branch_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
    </script>
@endsection
