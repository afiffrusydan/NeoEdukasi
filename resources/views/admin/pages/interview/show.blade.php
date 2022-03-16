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
                                href="{{ route('admin.vacancy.vacancy-application.show', ['id' => $vacancyData->id]) }}">Applicant
                                List</a>
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
                                <span class="nav-main-link-name">Vacancy Information</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link link-fx" id="nav-home-tab" data-toggle="tab"
                                href="#nav-tentorInformation" role="tab" aria-controls="nav-home" aria-selected="true">
                                <i class="nav-main-link-icon fa fa-address-card"></i>
                                <span class="nav-main-link-name">Tentor Information</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link link-fx" id="nav-contact-tab" data-toggle="tab" href="#nav-certificate"
                                role="tab" aria-controls="nav-contact" aria-selected="false">
                                <i class="nav-main-link-icon fa fa-certificate"></i>
                                <span class="nav-main-link-name">Certificate</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link link-fx" id="nav-about-tab" data-toggle="tab" href="#nav-transcripts"
                                role="tab" aria-controls="nav-about" aria-selected="false">
                                <i class="nav-main-link-icon fa fa-file"></i>
                                <span class="nav-main-link-name">Transcripts</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="block block-rounded tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="col-xl-12 order-xl-0 tab-pane fade show active" id="nav-vacancyInformation" role="tabpanel"
                aria-labelledby="nav-vacancyInformation-tab">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Vacancy Detail</label>
                        </div>
                        <div class="row g-3 col-12 ">
                            <div class="col-12">
                                <label class="form-label tittle-neo">Full Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="First Name"
                                    value="{{ $studentData->first_name . ' ' . $studentData->last_name }}" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label tittle-neo">Address</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->address }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Class</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->class }}" disabled>
                            </div>
                            <div class="col-6">
                                <label class="form-label tittle-neo">Curriculum</label>
                                <input type="text" name="first_name" class="form-control"
                                    value="{{ $studentData->curriculum }}" disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Subject</label>
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
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Tentor Detail</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Full Name</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Branch</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->branch_name }}" disabled>
                            </div>
                            <div class="col-12 col-md-12 py-1 d-flex flex-column flex-1">
                                <label class="form-label tittle-neo">Address</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->address }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">NIK</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->NIK }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Gender</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->gender }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Email</label>
                                <input type="text" class="form-control body-block-3" value="{{ $tentorData->email }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Place and Date of Birth</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ $tentorData->POB . ', ' . date('d M Y', strtotime($tentorData->DOB)) }}"
                                    disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Religion</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->religion) }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Bank Account</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->bank_name) }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Job Status</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->job_status) }}" disabled>
                            </div>
                            <div class="col-12 col-md-6 py-1">
                                <label class="form-label tittle-neo">Last Education</label>
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
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Tentors Certificate</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12 py-1">
                                <label class="form-label tittle-neo">Certificate</label>
                                <div class='embed-responsive'>
                                    <object
                                        data="{{ route('admin.vacancy.interview.get-ijazah', ['id' => $tentorData->id]) }}page=1&zoom=300"
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
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Tentors Transcripts</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 col-md-12 py-1">
                                <label class="form-label tittle-neo">Transcripts</label>
                                <div class='embed-responsive'>
                                    <object
                                        data="{{ route('admin.vacancy.interview.get-transkip', ['id' => $tentorData->id]) }}page=1&zoom=300"
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
                <div class="mb-4 col-12 text-center">
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-sm-2 mb-3">
                            <button type="button" id="declineButton" class="btn btn-sm btn-danger btn-block">
                                Decline
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button type="button" id="shortlistButton" class="btn btn-sm btn-info btn-block">
                                Add to Shortlist
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button type="button" id="acceptButton" class="btn btn-sm btn-neo btn-block">
                                Accept
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
                                Decline
                            </button>
                        </div>
                        <div class="col-12 col-sm-2">
                            <button type="button" id="acceptButton" class="btn btn-sm btn-neo btn-block">
                                Accept
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
                            console.log(error);
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
                text: "Accept applicant to job vacancy?",
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
                        imageUrl: "{{ asset('images/loader.gif') }}",
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
                            console.log(error);
                        }
                    });
                }
            });
        });
        $("#shortlistButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "Add applicant to Shortlist?",
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
                        imageUrl: "{{ asset('images/loader.gif') }}",
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
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
