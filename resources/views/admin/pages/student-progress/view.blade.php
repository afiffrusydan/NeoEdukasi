<title>{{ 'Tentors Dashboard' }}</title>
@extends('admin.layouts.app')

@section('content')
    <!-- Hero -->
    <title>Laravel Bootstrap Datepicker</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
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
                                <a class="link-fx" href="{{ route('admin.submission.student-progress.index') }}">Student Progress Report</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a class="link-fx" href="">Student Progress Report Detail</a>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('tentor.progress-report.submit') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                            <div class="row g-3 col-12-line1">
                                <label class="form-label tittle">Student Progress Report</label>
                            </div>
                            <form method="POST" action="{{ route('admin.student.all.update') }}"
                                enctype="multipart/form-data">
                                @csrf
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
                                        <label class="form-label tittle-neo">Learning Progression ( Perkembangan Belajar
                                            )</label>
                                        <textarea name="learning_progression" class="form-control" required autofocus
                                            disabled rows="3">{{ $data->learning_progression }}</textarea>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label tittle-neo">Study Target ( Target Belajar )</label>
                                        <textarea name="study_target" class="form-control" required autofocus disabled
                                            rows="3">{{ $data->study_target }}</textarea>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label tittle-neo">Study Method ( Metode Belajar )</label>
                                        <input type="text" name="study_method" class="form-control"
                                            value="{{ $data->study_method }}" required autofocus disabled>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <label class="form-label tittle-neo">Feedback ( Saran )</label>
                                        <textarea name="feedback" class="form-control" required autofocus disabled
                                            rows="3">{{ $data->feedback }}</textarea>
                                    </div>
                                </div>
                                @if ($data->status == 0)
                                <div class="invisible pt-6" id="saveChanges" data-toggle="appear">
                                    <div class="mb-4 col-12 text-center">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12 col-sm-3 mb-3">
                                                <button type="button" id="declineButton"
                                                    class="btn btn-sm btn-danger btn-block">
                                                    Decline
                                                </button>
                                            </div>
                                            <div class="col-12 col-sm-3">
                                                <button type="button" id="approveButton"
                                                    class="btn btn-sm btn-neo btn-block">
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
                                                <button type="button" id="declinedButton"
                                                    class="btn btn-sm btn-danger btn-block" disabled>
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
                                                <button type="button" id="approveButton"
                                                    class="btn btn-sm btn-neo btn-block" disabled>
                                                    Approved
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                     
                                @endif
                            </form>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END Dynamic Table Full -->
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
                        url: "{{ route('admin.submission.student-progress.decline') }}",
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
                                window.location.href = ("{{ route('admin.submission.student-progress.detail', ['id'=>$data->id]) }}");
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
                        url: "{{ route('admin.submission.student-progress.approve') }}",
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
                                window.location.href = ("{{ route('admin.submission.student-progress.detail', ['id'=>$data->id]) }}");
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
