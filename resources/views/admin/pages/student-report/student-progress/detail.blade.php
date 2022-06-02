<title>Detail Laporan Perkembangan Siswa</title>
@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="bg-body-light border-right-neo">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Detail Laporan Perkembangan Siswa<small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx"
                                href="{{ route('admin.submission.student-progress.index') }}">Laporan Perkembangan
                                Siswa</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $data->stdFirstName . ' ' . $data->stdLastName . '  ( ' . $data->subject . ' )' }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 order-xl-0">
            <!-- Dynamic Table Full -->
            <div class="block">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="row g-3 col-12-line1">
                        <label class="form-label tittle">Laporan Perkembangan Siswa</label>
                    </div>
                    <div class="row g-3 col-12">

                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Nama Siswa ( Mata Pelajaran )</label>
                            <select class="form-control selectpicker" id="studentId" name="student_id"
                                data-live-search="true" data-size="4" disabled>
                                <option value="{{ $data->stdId }}" selected>
                                    {{ $data->stdFirstName . ' ' . $data->stdLastName . '  ( ' . $data->subject . ' )' }}
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Bulan</label>
                            <select class="form-control selectpicker" id="monthSelect" name="month" disabled>
                                <option value="0" selected disabled>
                                    {{ date('F Y', strtotime($data->month)) }}
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Perkembangan Belajar</label>
                            <textarea name="learning_progression" class="form-control" required autofocus disabled
                                rows="3">{{ $data->learning_progression }}</textarea>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Target Belajar</label>
                            <textarea name="study_target" class="form-control" required autofocus disabled
                                rows="3">{{ $data->study_target }}</textarea>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Metode Belajar</label>
                            <input type="text" name="study_method" class="form-control"
                                value="{{ $data->study_method }}" required autofocus disabled>
                        </div>
                        <div class="col-12 col-md-12 pb-4">
                            <label class="form-label tittle-neo">Saran / Masukan</label>
                            <textarea name="feedback" class="form-control" required autofocus disabled rows="3">{{ $data->feedback }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>
@endsection
