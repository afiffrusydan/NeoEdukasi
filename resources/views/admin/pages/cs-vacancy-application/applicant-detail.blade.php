<title>Detail Lamaran Pekerjaan</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="block bg-body-light shadow-sm">
            <div class="content content-full bg-header-tentor" style="
                background-image:url({{ asset('images/Asset/header-tentors.png') }});">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-2">
                            Applicant Detail
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx"
                                    href="{{ route('admin.vacancy.vacancy-application.show', ['id' => $vacancyData->id]) }}">Daftar
                                    Pelamar</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                {{ $studentData->first_name . ' ' . $studentData->last_name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded border-right-neo">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->

                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1">
                                    @if ($interviewStatus == 1)
                                        <div class="items-push float-sm-right">
                                            <i class="fa fa-check-circle text-info" aria-hidden="true"
                                                style="font-size: 20px;"></i>
                                        </div>
                                    @endif
                                    <label class="form-label tittle">Detail Lowongan Pekerjaan</label>

                                </div>
                            </div>
                        </div>
                        <div class="row g-3 col-12 ">
                            <div class="col-12">
                                <label class="form-label tittle-neo">Nama Lengkap Siswa</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                    value="{{ $studentData->first_name . ' ' . $studentData->last_name }}" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label tittle-neo">Alamat</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->address }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Kelas</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->class }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Kurikulum</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->curriculum }}" disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Mata Pelajaran</label>
                                <input type="text" name="first_name" class="form-control "
                                    value="{{ $vacancyData->subject }}" disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Kriteria</label>
                                @foreach (explode('~', $vacancyData->criteria) as $info)
                                    <input type="text" name="first_name" class="form-control mb-2"
                                        value="{{ $info }}" disabled>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="block block-rounded border-right-neo">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Detail Pelamar</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 py-1">
                                <label class="form-label tittle-neo">Nama Lengkap Tentor</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}" disabled>

                            </div>
                            <div class="col-6 py-1 d-flex flex-column flex-1">
                                <label class="form-label tittle-neo">Alamat</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->address }}"
                                    disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Jenis Kelamin</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->gender }}"
                                    disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Pekerjaan</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->job_status) }}" disabled>

                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Pendidikan Terakhir</label>
                                <input type="text" class="form-control body-block-3"
                                    value=" {{ ucwords($tentorData->last_education) }}" disabled>
                            </div>
                        </div>
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="declineButton"
                                                class="btn btn-sm btn-danger btn-block">
                                                Tolak
                                            </button>
                                        </div>
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="acceptButton"
                                                class="btn btn-sm btn-neo btn-block">
                                                Terima
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END Page Content -->

    <script>
        $("#declineButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "You still can change this record",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: "#d26a5c"
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        text: "Please wait",
                        imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ route('admin.vacancy.vacancy-application.decline') }}",
                        type: "POST",
                        data: {
                            id: id,
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
                                    "{{ route('admin.vacancy.vacancy-application.selected.show', ['id' => $vacancyData->id]) }}"
                                );
                            }, 1000);
                        },

                        error: function(error) {
                            Swal.fire({
                                title: 'Update Status :',
                                text: error,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    });
                }
            });
        });
        $("#acceptButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "Accept applicant?",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes, I want',
                confirmButtonColor: "#6fa306"
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        text: "Please wait",
                        imageUrl: "https://mir-s3-cdn-cf.behance.net/project_modules/disp/583b6136197347.571361641da25.gif",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ route('admin.vacancy.vacancy-application.accept') }}",
                        type: "POST",
                        data: {
                            id: id,
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
                                    "{{ route('admin.vacancy.vacancy-application.selected.show', ['id' => $vacancyData->id]) }}"
                                );
                            }, 1000);
                        },

                        error: function(error) {
                            Swal.fire({
                                title: 'Update Status :',
                                text: error,
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
