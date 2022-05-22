<title>Detail Pengajuan Gaji</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Hero -->
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full  border-right-neo">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Detail Pengajuan Gaji<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('tentor.salary-submission.index') }}">Pengajuan Gaji</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Detail</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-0 ">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Detail Pengajuan Gaji</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Nama Siswa ( Mata Pelajaran )</label>
                                <select class="form-control selectpicker" id="studentId" name="id" disabled required>
                                    <option value="{{ $data->id }}" selected>
                                        {{ $data->stdFirstName.' '.$data->stdLastName.' ( '.$data->subject.' )' }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Bulan</label>
                                <select class="form-control selectpicker" id="monthSelect" name="month" disabled required>
                                    <option value="{{ $data->month }}" selected>
                                        {{ date('F Y', strtotime($data->month)) }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Jumlah Jam Pertemuan</label>
                                        <input type="number" class="form-control form-control-alt" name="meet_hours"
                                            id="meet_hours" onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                            placeholder="Jumlah Pertemuan" value="{{ $data->meet_hours }}" readonly>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Tambahan Pertemuan  (Menit)</label>
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <input type="number" class="form-control form-control-alt"
                                            name="extra_meet_hours" id="extra_meet_hours"
                                            onkeyup="this.value=this.value.replace(/[^\d]/,'')"
                                            placeholder="Jumlah Pertemuan (Menit)" value="{{ $data->extra_meet_hours }}" readonly>
                                    </div>
                                    <div class="col-4 col-md-2">
                                        <button type="button" id="extra" class="btn btn-light btn-block" disabled>
                                            &nbsp
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Tambahan Biaya</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control form-control-alt" name="add_cost"
                                        id="add_cost"
                                        placeholder="Additional Cost" value="{{ $data->add_cost }}" readonly>
                                </div>
                            </div>
                        </div>
                        @if ($data->status == 10)
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3">
                                            <button type="button" id="approveButton"
                                                class="btn btn-sm btn-neo btn-block disabled">
                                                Disetujui
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($data->status == -10)
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="submitButton" class="btn btn-sm btn-neo btn-block disabled">
                                                Ditolak
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3">
                                            <button type="button" id="approveButton" class="btn btn-sm btn-neo btn-block disabled"
                                                >
                                                Diajukan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
    <!-- END Page Content -->

@endsection
