<title>Verifikasi Akun Tentor</title>
@extends('admin.layouts.app')
@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="bg-body-light block">
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
        <!-- END Hero -->
        <!-- Dynamic Table Full -->
        <div class="block block-rounded tab-content py-3 px-sm-0" id="nav-tabContent">
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-interview" role="tabpanel"
            aria-labelledby="nav-vacancyInformation-tab">
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12 ">
                        <div class="table-responsive py-1">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%;">#</th>
                                        <th style="width: 20%;">Nama Lengkap</th>
                                        <th style="width: 10%;">Cabang</th>
                                        <th style="width: 10%;">Email</th>
                                        <th class="text-center" style="width: 15%;">Tanggal</th>
                                        <th class="text-center" style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tentors as $tentor)
                                        <tr>
                                            <td class="text-center">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="fw-semibold fs-sm">
                                                <a
                                                    href="{{ route('admin.tentor-verification.detail', ['id' => $tentor->id]) }}">{{ $tentor->first_name . ' ' . $tentor->last_name }}</a>
                                            </td>
                                            <td class="fs-sm">
                                                {{ $tentor->branch_name }}
                                            </td>
                                            <td class="fs-sm"><em
                                                class="text-muted">{{ $tentor->email }}</em></td>
                                                <td class="fs-sm">
                                                    {{ date('d F Y', strtotime($tentor->updated_at)) }}
                                                </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-alt-secondary"
                                                        onclick="" data-bs-toggle="tooltip" title="Detail">
                                                        <a href="{{ route('admin.tentor-verification.detail', ['id' => $tentor->id]) }}"
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
