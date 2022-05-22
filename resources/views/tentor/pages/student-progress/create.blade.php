<title>Form Laporan Perkembangan Siswa</title>
@extends('tentor.layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />

@section('content')

    <div class="content shadow-sm">
        <div class="bg-body-light">
            <div class="content content-full  border-right-neo">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Tambah Laporan Perkembangan Siswa<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="{{ route('tentor.progress-report.index') }}">Laporan
                                    Perkembangan Siswa</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Tambah</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
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
            <form method="POST" action="{{ route('tentor.progress-report.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="col-12-line1">
                        <label class="form-label tittle">Laporan Perkembangan Siswa</label>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Nama Siswa (Mata Pelajaran)</label>
                                <select class="form-control selectpicker" id="studentId" name="tentored_id"
                                    data-live-search="true" data-size="8">
                                    <option value="0" selected disabled>
                                        Silahkan Pilih
                                    </option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->stdId }}">
                                            {{ $student->first_name . ' ' . $student->last_name . '  ( ' . $student->subject . ' )' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Bulan</label>
                                <select class="form-control" id="monthSelect" name="month" disabled>
                                    <option value="0" selected disabled>
                                        Silahkan Pilih
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Progres Belajar Siswa</label>
                                <textarea name="learning_progression" class="form-control" required autofocus rows="3"
                                    placeholder="Progres Belajar Siswa"></textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Target Belajar</label>
                                <textarea name="study_target" class="form-control" required autofocus rows="3"
                                    placeholder="Target Belajar"></textarea>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Metode Belajar</label>
                                <input type="text" name="study_method" class="form-control"
                                    value="{{ old('first_name') }}" placeholder="Metode Belajar" required autofocus>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label tittle-neo">Saran / Masukan</label>
                                <textarea name="feedback" class="form-control" required autofocus rows="3"
                                    placeholder="Saran / Masukan">{{ old('feedback') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 col-12 d-flex justify-content-center mt-200 mt-4">
                        <button class="btn btn-neo btn-sm" name="submit" type="submit">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Page Content -->
    <script>
        $('#studentId').on('change', function() {
            var selected = $(this).val();
            Swal.fire({
                title: "",
                text: "Please wait...",
                imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                showConfirmButton: false,
                allowOutsideClick: false
            });
            $.ajax({
                url: "{{ route('tentor.progress-report.get-month') }}",
                type: "POST",
                // dataType: 'json',
                data: {
                    id: selected,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let optionList = document.getElementById('monthSelect').options;
                    if (response.length != 0) {
                        $("#monthSelect").prop("disabled", false);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Silahkan Pilih</option>");

                        response.forEach(response =>
                            optionList.add(
                                new Option(response.text, response.id)
                            )
                        );
                        swal.close()
                    } else {
                        $("#monthSelect").prop("disabled", true);
                        $("#monthSelect").empty().append(
                            "<option disabled='disabled' SELECTED>Data Tidak Ditemukan</option>");
                        swal.close()
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
@endsection
