<title>Student Progress Report Detail</title>
@extends('tentor.layouts.app')

@section('content')
    <!-- Hero -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full  border-right-neo">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Detail Laporan Perkembangan Siswa<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('tentor.progress-report.index') }}">Laporan Perkembangan Siswa</a>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Laporan Perkembangan Siswa</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Nama Siswa (Mata Pelajaran)</label>
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
                            @php
                                if ($data->status != -10) {
                                    $status = 'disabled';
                                }else {
                                    $status = '';
                                }
                            @endphp
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Progres Belajar Siswa</label>
                                <textarea id="learning_progression" name="learning_progression" class="form-control learn_prog" required autofocus
                                    {{ $status }} rows="3">{{ $data->learning_progression }}</textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Target Belajar</label>
                                <textarea id="study_target" name="study_target" class="form-control std_trgt" required autofocus {{ $status }}
                                    rows="3">{{ $data->study_target }}</textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Metode Belajar</label>
                                <input type="text" id="study_method" name="study_method" class="form-control std_mthd"
                                    {{ $status }} value="{{ $data->study_method }}" required>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Saran/Masukan</label>
                                <textarea id="feedback" name="feedback" class="form-control fdbck" required autofocus {{ $status }}
                                    rows="3">{{ $data->feedback }}</textarea>
                            </div>
                        </div>
                        @if ($data->status == 10)
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3">
                                            <button type="button" id="approveButton"
                                                class="btn btn-sm btn-neo btn-block disabled">
                                                Approved
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
                                            <button type="button" id="submitButton" class="btn btn-sm btn-neo btn-block">
                                                Save Changes
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
                                            <button type="button" id="approveButton" class="btn btn-sm btn-neo btn-block"
                                                disabled>
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
    <script>
        $("#submitButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            let learning_progression = document.getElementById('learning_progression').value;
            let target = document.getElementById('study_target').value;
            let method = document.getElementById('study_method').value;
            let feedback = document.getElementById('feedback').value;
            Swal.fire({
                title: 'Are You Sure?',
                text: "You still can change this record",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: "#6fa306"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('tentor.progress-report.update') }}",
                        type: "POST",
                        data: {
                            id: id,
                            learning_progression: learning_progression,
                            study_target: target,
                            study_method: method,
                            feedback: feedback,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Update Status :',
                                text: data,
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            setTimeout(function() {
                                window.location.href = (
                                    "{{ route('tentor.progress-report.index') }}"
                                    );
                            }, 1000);
                        },

                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>

@endsection
