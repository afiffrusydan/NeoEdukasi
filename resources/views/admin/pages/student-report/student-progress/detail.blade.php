<title>Applicant & Vacancy Detail</title>
@extends('admin.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Applicant & Vacancy Detail
                    </h1>
                    <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                        Applicant & Vacancy Information
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx"
                                href="{{ route('admin.student-report.student-progress.detail', ['id' => $data->id]) }}">Student Progress</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Applicant Detail
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Tentors Transcripts</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12 py-1">
                                <label class="form-label tittle-neo">Transcripts</label>
                                <div class='embed-responsive'>
                                    <object
                                        data="{{ route('admin.student-report.student-progress.get-report', ['id'=> $data->id]) }}"
                                        type='application/pdf' width='100%' height='100%'></object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
