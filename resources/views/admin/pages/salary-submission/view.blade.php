<title>{{ 'Tentors Dashboard' }}</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Hero -->
    <title>Laravel Bootstrap Datepicker</title>
    <!-- END Hero -->
    <!-- Page Content -->
    <div class="content">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill h3 my-2">
                        Student Progress Report Detail<small
                            class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                    </h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx"
                                    href="{{ route('admin.submission.student-progress.index') }}">Student Progress
                                    Report</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Student Progress Report Detail</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0">
            <div class="block">
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                    <div class="row g-3 col-12-line1">
                        <label class="form-label tittle">Tentor Salary</label>
                    </div>
                    <div class="row g-3 col-12">

                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Student Name</label>
                            <select class="form-control selectpicker" id="studentId" name="student_id"
                                data-live-search="true" data-size="4" disabled>
                                <option value="{{ $data->stdId }}" selected>
                                    {{ $data->stdFirstName . ' ' . $data->stdLastName . '  ( ' . $data->subject . ' )' }}
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Month</label>
                            <select class="form-control selectpicker" id="monthSelect" name="month" disabled>
                                <option value="0" selected disabled>
                                    {{ date('F Y', strtotime($data->month)) }}
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label tittle-neo">Total</label>
                            <input type="number" class="form-control form-control-alt" name="meet_hours" id="meet_hours"
                                value="{{ $data->total }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="row g-3 col-12-line1">
                        <ul class="nav nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-contact-tab" data-toggle="tab"
                                    href="#nav-attendance" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="nav-main-link-icon fa fa-certificate"></i>
                                    <span class="nav-main-link-name">Presensi</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-home-tab" data-toggle="tab"
                                    href="#nav-documentation" role="tab" aria-controls="nav-home" aria-selected="true">
                                    <i class="nav-main-link-icon fa fa-address-card"></i>
                                    <span class="nav-main-link-name">Documentation</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link link-fx" id="nav-about-tab" data-toggle="tab" href="#nav-proof"
                                    role="tab" aria-controls="nav-about" aria-selected="false">
                                    <i class="nav-main-link-icon fa fa-file"></i>
                                    <span class="nav-main-link-name">Bukti</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="row g-3 col-12">
                        <div class="block-content tab-content">
                            <div class="tab-pane pull-x fs-sm active" id="nav-attendance" role="tabpanel"
                                aria-labelledby="nav-certificate-tab">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12">
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Jumlah Jam Pertemuan</label>
                                            <input type="number" class="form-control form-control-alt" name="meet_hours"
                                                id="meet_hours" value="{{ $data->meet_hours }}" >
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Tambahan Jam Pertemuan (Menit)</label>
                                            <div class="row g-3">
                                                <div class="col-8 col-md-10">
                                                    <input type="text" class="form-control form-control-alt"
                                                        name="extra_meet_hours" id="extra_meet_hours"
                                                        value="{{ $data->extra_meet_hours }} Menit" disabled>
                                                </div>
                                                <div class="col-4 col-md-2">
                                                    <button type="button" id="extra" class="btn btn-light btn-block"
                                                        disabled>
                                                        {{ intval($data->extra_meet_hours / 30) }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Presensi</label>
                                            <div class='embed-responsive'>
                                                <img id="zoom"
                                                    src="{{ route('admin.submission.salary-submission.get-presence', ['id' => $data->id]) }}"
                                                    data-zoom-image="{{ route('admin.submission.salary-submission.get-presence', ['id' => $data->id]) }}" />

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane pull-x fs-sm" id="nav-documentation" role="tabpanel"
                                aria-labelledby="nav-documentation-tab">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12">
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Documentation</label>
                                            <div class='embed-responsive'>
                                                <img id="zoom1"
                                                    src="{{ route('admin.submission.salary-submission.get-documentation', ['id' => $data->id]) }}"
                                                    data-zoom-image="{{ route('admin.submission.salary-submission.get-documentation', ['id' => $data->id]) }}" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane pull-x fs-sm" id="nav-proof" role="tabpanel"
                                aria-labelledby="nav-proof-tab">
                                <div class="row g-3">
                                    <div class="col-12 col-md-12">
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Aditional Cost</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp.</span>
                                                <input type="number" class="form-control form-control-alt" name="add_cost" id="add_cost"
                                                    placeholder="Additional Cost" value="{{ $data->add_cost }}">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label class="form-label tittle-neo">Bukti</label>
                                            <div class='embed-responsive'>
                                                <img id="zoom2"
                                                    src="{{ route('admin.submission.salary-submission.get-proof', ['id' => $data->id]) }}"
                                                    data-zoom-image="{{ route('admin.submission.salary-submission.get-proof', ['id' => $data->id]) }}" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($data->status == 0)
            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                <div class="mb-4 col-12 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-3 mb-3">
                            <button type="button" id="declineButton" class="btn btn-sm btn-danger btn-block">
                                Decline
                            </button>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button type="button" id="approveButton" class="btn btn-sm btn-neo btn-block">
                                Approve
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
                            <button type="button" id="declinedButton" class="btn btn-sm btn-danger btn-block" disabled>
                                Declined
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
                            <button type="button" id="approveButton" class="btn btn-sm btn-neo btn-block" disabled>
                                Approved
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
                title: 'Are You Sure?',
                text: "You still can change this record",
                icon: 'info',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                confirmButtonColor: "#d26a5c"
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('admin.submission.salary-submission.decline') }}",
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
                                    "{{ route('admin.submission.salary-submission.detail', ['id' => $data->id]) }}"
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
        $("#approveButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "Approve Student Progress Report?",
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
                        // imageUrl: "{{ asset('storage/tentors/tentor-photo-profile/30.jpg') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ route('admin.submission.salary-submission.approve') }}",
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
                                    "{{ route('admin.submission.salary-submission.detail', ['id' => $data->id]) }}"
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
