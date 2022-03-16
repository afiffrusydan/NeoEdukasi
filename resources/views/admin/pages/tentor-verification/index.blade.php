<title>Tentor Verification</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- Hero -->
        <div class="bg-body-light block">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tentor Verification
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">{{ ucwords(
                                Auth::user()->getRoleNames()->first(),
                            ) }}</li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tentor Verification</a>
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
                    New Tentor Verification
                </div>
                <div class="table-responsive">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%;">#</th>
                                <th style="width: 10%;">Full Name</th>
                                <th style="width: 10%;">Last Education</th>
                                <th style="width: 10%;">Branch</th>
                                <th style="width: 10%;">Email</th>
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
                                        {{ $tentor->last_education }}
                                    </td>
                                    <td class="fs-sm">
                                        {{ $tentor->branch_name }}
                                    </td>
                                    <td class="fs-sm"><em class="text-muted">{{ $tentor->email }}</em></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-alt-secondary" onclick=""
                                                data-bs-toggle="tooltip" title="Detail">
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


        <div class="block">
            <div class="block-content block-content-full">
                <div class="tittle-neo h4">
                    Tentor Verification (Update)
                </div>
                <div class="table-responsive">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 1%;">#</th>
                                <th style="width: 10%;">Full Name</th>
                                <th style="width: 10%;">Last Education</th>
                                <th style="width: 10%;">Branch</th>
                                <th style="width: 10%;">Email</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($oldtentors as $tentor)
                                <tr>
                                    <td class="text-center">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td class="fw-semibold fs-sm">
                                        <a
                                            href="{{ route('admin.tentor-verification.detail', ['id' => $tentor->id]) }}">{{ $tentor->first_name . ' ' . $tentor->last_name }}</a>
                                    </td>
                                    <td class="fs-sm">
                                        {{ $tentor->last_education }}
                                    </td>
                                    <td class="fs-sm">
                                        {{ $tentor->branch_name }}
                                    </td>
                                    <td class="fs-sm"><em class="text-muted">{{ $tentor->email }}</em></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-alt-secondary" onclick=""
                                                data-bs-toggle="tooltip" title="Detail">
                                                <a href="{{ route('admin.tentor-verification.verification-detail', ['id' => $tentor->id]) }}"
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
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->
@endsection
