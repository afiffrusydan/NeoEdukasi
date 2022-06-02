<title>Detail Interview Lowongan Pekerjaan</title>
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
                            Detail Interview Lowongan Pekerjaan
                        </h1>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx"
                                    href="{{ route('admin.vacancy.interview.show', ['id' => $vacancyData->id]) }}">Daftar Interview</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                {{ $tentorData->first_name . ' ' . $tentorData->last_name }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0 border-right-neo shadow-sm" id="nav-tabContent">
            <div class="bg-white p-2 push">
                <div class="d-lg-none">
                    <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
                        data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered"
                        data-class="d-none">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <nav>
                    <div id="horizontal-navigation-hover-centered" class="d-none d-lg-block mt-2 mt-lg-0">
                        <ul class="nav nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx active" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-vacancyInformation" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                                    <span class="nav-main-link-name">Informasi Lowongan Pekerjaan</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-tentorInformation" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-address-card"></i>
                                    <span class="nav-main-link-name">Informasi Pelamar ( Tentor )</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-contact-tab" data-toggle="tab" href="#nav-certificate"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="nav-main-link-icon fa fa-certificate"></i>
                                    <span class="nav-main-link-name">File Ijazah</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-about-tab" data-toggle="tab" href="#nav-transcripts"
                                    role="tab" aria-controls="nav-about" aria-selected="false">
                                    <i class="nav-main-link-icon fa fa-file"></i>
                                    <span class="nav-main-link-name">File Transkip Nilai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-vacancyInformation" role="tabpanel"
                aria-labelledby="nav-vacancyInformation-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1">
                                    @if($interviewStatus == 1)
                                    <div class="items-push float-lg-right">
                                        <i class="fa fa-check-circle text-info text-center" aria-hidden="true" style="font-size: 20px;"></i>
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
                                <label class="form-label tittle-neo">Criteria</label>
                                @foreach (explode('~', $vacancyData->criteria) as $info)
                                    <input type="text" name="first_name" class="form-control mb-2"
                                        value="{{ $info }}" disabled>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show" id="nav-tentorInformation" role="tabpanel"
                aria-labelledby="nav-tentorInformation-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        
                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1">
                                    @if($interviewStatus == 1)
                                    <div class="items-push float-lg-right">
                                        <i class="fa fa-check-circle text-info text-center" aria-hidden="true" style="font-size: 20px;"></i>
                                    </div>
                                    @endif
                                    <label class="form-label tittle">Detail Tentor</label>

                                </div>
                            </div>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Cabang</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->branch_name }}" disabled>
                            </div>
                            <div class="col-12 col-md-12 py-1 d-flex flex-column flex-1">
                                <label class="form-label tittle-neo">Alamat</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->address }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">NIK</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->NIK }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Jenis Kelamin</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->gender }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Email</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->email }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ $tentorData->POB . ', ' . date('d M Y', strtotime($tentorData->DOB)) }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Agama</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->religion) }}" disabled>
                            </div>
                            {{-- <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Akun Bank</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->bank_name) }}" disabled>
                            </div> --}}
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Pekerjaan</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->job_status) }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Pendidikan Terakhir</label>
                                <input type="text" class="form-control body-block-3"
                                    value=" {{ ucwords($tentorData->last_education) }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show" id="nav-certificate" role="tabpanel"
                aria-labelledby="nav-certificate-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1">
                                    @if($interviewStatus == 1)
                                    <div class="items-push float-lg-right">
                                        <i class="fa fa-check-circle text-info text-center" aria-hidden="true" style="font-size: 20px;"></i>
                                    </div>
                                    @endif
                                    <label class="form-label tittle">File Ijazah Tentor</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12 py-1">
                                <label class="form-label tittle-neo">File Ijazah</label>
                                <div class='embed-responsive'>
                                    <object
                                        data="{{ route('admin.vacancy.interview.get-ijazah', ['id' => $tentorData->id]) }}"
                                        type='application/pdf' width='100%' height='100%'></object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-12 order-xl-0 tab-pane fade show" id="nav-transcripts" role="tabpanel"
                aria-labelledby="nav-transcripts-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row">
                            <div class="col-xl-12 order-xl-0">
                                <div class="col-12-line1">
                                    @if($interviewStatus == 1)
                                    <div class="items-push float-lg-right">
                                        <i class="fa fa-check-circle text-info text-center" aria-hidden="true" style="font-size: 20px;"></i>
                                    </div>
                                    @endif
                                    <label class="form-label tittle">File Transkip Nilai Tentor</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12 py-1">
                                <label class="form-label tittle-neo">File Transkip Nilai</label>
                                <div class='embed-responsive'>
                                    <object
                                        data="{{ route('admin.vacancy.interview.get-transkip', ['id' => $tentorData->id]) }}"
                                        type='application/pdf' width='100%' height='100%'></object>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @if ($data->status == 10 or $data->status == 0)
            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                <div class="mb-4 pb-4 col-12 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-2">
                            <button type="button" id="declineButton" class="btn btn-sm btn-danger btn-block">
                                Tolak
                            </button>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button type="button" id="shortlistButton" class="btn btn-sm btn-info btn-block">
                                Tambahkan ke Shortlist
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button type="button" id="acceptButton" class="btn btn-sm btn-neo btn-block">
                                Terima
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($data->status == 50)
            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                <div class="mb-4 col-12 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-2 mb-3">
                            <button type="button" id="declineButton" class="btn btn-sm btn-danger btn-block">
                                Tolak
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button type="button" id="acceptButton" class="btn btn-sm btn-neo btn-block">
                                Terima
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- END Page Content -->

    <script>
        $("#declineButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Menolak Pelamar pada Lowongan Pekerjaan?",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
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
                        url: "{{ route('admin.vacancy.interview.decline') }}",
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
                                window.location.href = ("{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}");
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
                            setTimeout(function() {
                                window.location.href = (
                                    "{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}"
                                );
                            }, 1000);
                        }
                    });
                }
            });
        });
        $("#acceptButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Menerima Pelamar Pada Lowongan Pekerjaan?",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
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
                        url: "{{ route('admin.vacancy.interview.accept') }}",
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
                                window.location.href = ("{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}");
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
                            setTimeout(function() {
                                window.location.href = (
                                    "{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}"
                                );
                            }, 1000);
                        }
                    });
                }
            });
        });
        $("#shortlistButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Menambahkan Pelamar ke shortlist?",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                confirmButtonColor: "#70b9eb"
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
                        url: "{{ route('admin.vacancy.interview.shortlist') }}",
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
                                window.location.href = ("{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}");
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
                            setTimeout(function() {
                                window.location.href = (
                                    "{{ route('admin.vacancy.interview.show', ['id'=>$vacancyData->id]) }}"
                                );
                            }, 1000);
                        }
                    });
                }
            });
        });
    </script>
@endsection
