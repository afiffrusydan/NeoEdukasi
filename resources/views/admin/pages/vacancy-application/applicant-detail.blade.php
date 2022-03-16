<title>Tentor Verification</title>
@extends('admin.layouts.app')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-2">
                        Applicant Detail
                    </h1>
                    <h5 class="fs-base lh-base fw-medium text-muted mb-0">
                        Form for job vacancy detail
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
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
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
                                <input type="text" name="first_name" class="form-control" value="{{ $studentData->class }}"
                                    disabled>
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
        </div>
        <div class="block block-rounded">
            <div class="col-xl-12 order-xl-0">
                <!-- Dynamic Table Full -->
                <div class="block">
                    <div class="block-content block-content-full">
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                        <div class="row g-3 col-12-line1">
                            <label class="form-label tittle">Applicant Detail</label>
                        </div>
                        <div class="row g-3 col-12">
                            <div class="col-12 py-1">
                                <label class="form-label tittle-neo">Full Name</label>
                                <input type="text" class="form-control" placeholder="First Name"
                                    value="{{ $tentorData->first_name . ' ' . $tentorData->last_name }}" disabled>

                            </div>
                            <div class="col-6 py-1 d-flex flex-column flex-1">
                                <label class="form-label tittle-neo">Address</label>
                                    <input type="text" class="form-control body-block-3"
                                    value="{{ $tentorData->address }}" disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Gender</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ $tentorData->gender }}" disabled>
                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Job Status</label>
                                <input type="text" class="form-control body-block-3"
                                    value="{{ ucwords($tentorData->job_status) }}" disabled>

                            </div>
                            <div class="col-6 py-1">
                                <label class="form-label tittle-neo">Last Education</label>
                                <input type="text" class="form-control body-block-3"
                                value=" {{ ucwords($tentorData->last_education) }}" disabled>
                            </div>
                        </div>
                        @if ($data->status == -100)
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="declinedButton"
                                                class="btn btn-sm btn-danger btn-block" disabled>
                                                Declined
                                            </button>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <button type="button" id="inviteButton" class="btn btn-sm btn-neo btn-block">
                                                Invite to Interview
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($data->status == 10 OR $data->status == 0)
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="declinedButton"
                                                class="btn btn-sm btn-neo btn-block disabled">
                                                Interview Process
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                <div class="mb-4 col-12 text-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-12 col-sm-3 mb-3">
                                            <button type="button" id="declineButton"
                                                class="btn btn-sm btn-danger btn-block">
                                                Not Suitable
                                            </button>
                                        </div>
                                        <div class="col-12 col-sm-3">
                                            <button type="button" id="inviteButton" class="btn btn-sm btn-neo btn-block">
                                                Invite to Interview
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
                                window.location.href = ("{{ route('admin.vacancy.vacancy-application.show', ['id'=>$vacancyData->id]) }}");
                            }, 1000);
                        },

                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });
        });
        $("#inviteButton").click(function(event) {
            event.preventDefault();
            let id = "{{ $data->id }}";
            Swal.fire({
                title: 'Are You Sure?',
                text: "invite the applicant to interview process?",
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
                        imageUrl: "{{ asset('storage/tentors/tentor-photo-profile/30.jpg') }}",
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $.ajax({
                        url: "{{ route('admin.vacancy.vacancy-application.invite') }}",
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
                                window.location.href = ("{{ route('admin.vacancy.vacancy-application.show', ['id'=>$vacancyData->id]) }}");
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
