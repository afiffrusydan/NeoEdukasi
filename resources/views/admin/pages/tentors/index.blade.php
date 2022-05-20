<title>Tentor Verification</title>
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
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="bg-body-light block">
            <div class="content content-full bg-header-tentor" style="
            background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tentor List
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
        <!-- END Hero -->
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-content block-content-full">
                <div class="tittle-neo h4">
                    Tentor List
                </div>
                <div class="table-responsive py-1">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center" style="width: 1%;">#</th>
                                <th style="width: 15%;">Full Name</th>
                                <th style="width: 10%;">Branch</th>
                                <th style="width: 10%;">Email</th>
                                <th style="width: 5%;">Status</th>
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
                                            href="{{ route('admin.tentor.detail', ['id' => $tentor->id]) }}">{{ $tentor->first_name . ' ' . $tentor->last_name }}</a>
                                    </td>
                                    <td class="fs-sm">
                                        {{ $tentor->branch_name }}
                                    </td>
                                    <td class="fs-sm"><em class="text-muted">{{ $tentor->email }}</em></td>
                                    <td class="fs-sm text-center">
                                        @if ($tentor->status == 0)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning text-white">Inactive</span>
                                        @elseif ($tentor->status == -10)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger text-white">Blacklist</span>
                                        @elseif ($tentor->status == 10)
                                            <span
                                                class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success text-white">Active</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-alt-secondary" onclick=""
                                                data-bs-toggle="tooltip" title="Detail">
                                                <a href="{{ route('admin.tentor.detail', ['id' => $tentor->id]) }}"
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
    <!-- END Page Content -->
@endsection
