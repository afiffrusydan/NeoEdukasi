<title>Daftar Pelamar Terpilih</title>
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
            <div class="content content-full bg-header-tentor"
                style="
            background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Daftar Pelamar Terpilih
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('admin.vacancy.vacancy-application.index') }}">Lamaran
                                    Pekerjaan Terpilih</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Daftar Pelamar
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="block-content block-content-full">
                <div class="bg-white p-2 push">
                    <div class="form-group">
                        <label class="form-label ml-3 tittle-neo" for="forms-subscribe-email">Link Daftar
                            Tentor</label>
                        <div class="input-group">
                            <div class="col-12 col-md-10">
                                <input class="form-control" id="input-link" type="text" name="link"
                                    value="{{ App::make('url')->to('/tentor-list/' . Crypt::encryptString($id)) }}"
                                    readonly />
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="button" class="btn btn-lg btn-neo btn-block"
                                    onclick="return copyToClipboard(event, this);">
                                    <small>Copy</small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive py-1">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%;">#</th>
                                <th style="width: 15%;">Nama Lengkap</th>
                                <th style="width: 20%;">Pendidikan Terakhir</th>
                                <th style="width: 10%;">Pekerjaan</th>
                                <th style="width: 5%;">Cabang</th>
                                <th style="width: 5%;">Status</th>
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
                                        @if ($data->status == 50)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Terpilih</span>
                                        @elseif ($data->status == -100)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Declined</span>
                                        @else
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-danger">Submit</span>
                                        @endif
                                    </td>
                                    <td class="d-sm-table-cell text-center">
                                        <div class="btn-group center">
                                            <a href="{{ route('admin.vacancy.vacancy-application.selected.detail', ['id' => $data->appId]) }}"
                                                class="btn btn-sm btn-neo pull-right">Detail</a>
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
    {{-- <div class="row">
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
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 20%;">Pendidikan Terakhir</th>
                                        <th style="width: 10%;">Pekerjaan</th>
                                        <th style="width: 5%;">Cabang</th>
                                        <th style="width: 5%;">Status</th>
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
                                                @if ($data->status == 10 or $data->status == 0)
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
                                                        <a href="{{ route('admin.vacancy.vacancy-application.detail', ['id' => $data->appId]) }}"
                                                            class="btn btn-sm btn-neo pull-right">Detail</a>
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
        </div> --}}
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

<script>
    function copyToClipboard(e, btn) {
        e.preventDefault(); // prevent submit
        var str = document.getElementById("input-link");
        str.select();
        document.execCommand('copy');
        btn.innerHTML = "<small>Copied</small>";
        return false; // prevent submit
    }
</script>
@endsection
